<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Detail_Document;
use App\Models\Document;
use App\Models\Format;
use App\Models\Period;
use App\Models\Process;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class Estancia extends Controller
{
    public function Home(){

    }
    public function __VerifyProcess($PageProcess){
        $user_email = Auth::user()->email;
        $process = Process::where('users', $user_email)
            ->where('IdTypeProcess', $PageProcess)
            ->first();
        return $process ? true : false;
    }

    public function __VerifyPeriod(){
        $date = Carbon::now();
        $year = $date->year;
        $month = $date->month;
        if ($month >= 1 && $month <= 4) {
            $quarter = '01';
        } elseif ($month >= 5 && $month <= 8) {
            $quarter = '02';
        } else {
            $quarter = '03';
        }
        $idp = $year . $quarter;
        if (Period::find($idp)->first()){
            return $idp;
        } else {
            return false;
        }
    }

    public function SignupPeriod(Request $request,$PageProcess){
        
        $result = $this->__VerifyProcess($PageProcess);
        if($result == false){
            $process = new Process;
            $process->IdProcess = Auth::user()->email . $PageProcess;
            $process->IdTypeProcess = $PageProcess;
            $process->users = Auth::user()->email;
            $process->IdAcademicAdvisor = request('academicadviser');
            $process->IdEnterpriseAdviser = request('enterpriseadviser');
            $process->IdEnterprise = request('enterprise');
            $process->IdPeriod = $this->__VerifyPeriod();
            $process->save();
            Alert::Success('Exito!','Se te ha dado de alta en el periodo actual');
            return redirect('/documentos_proceso/'.$PageProcess);
        }else if($result == true){
            Alert::Error('Fallido','ya estas dado de alta en el periodo actual');
            return redirect('/documentos_proceso/'.$PageProcess);
        }
    }
    public function UploadDocument(Request $request, $PageProcess,$formatdesired){
        $ProcessUploadDocument = Process::find(Auth::user()->email . $PageProcess);
        if($ProcessUploadDocument == true){
            try{
                $validator = Validator::make($request->all(), [
                    'doc' => 'required|mimes:pdf|max:10240',
                ]);
    
                if ($validator->fails()) {
                    Alert::error('Error', 'Por favor, carga un archivo PDF válido.');
                    return redirect('/documentos_proceso/' . $PageProcess);
                }
                if($request->hasFile('doc')){
                    $path = public_path('/documents/');
                    $fileName = Auth::user()->email . '_' . $PageProcess . '_' . $formatdesired . '_' . time() . '.pdf';
                    $request->file('doc')->move($path, $fileName);
                    $document = new Document();
                    $detail_document = new Detail_Document();
                    $document->IdTypeDoc = $formatdesired;
                    $document->IdStatusDoc = 0;
                    $document->IdStatusDocAcademic = 0;
                    $document->IdStatusDocEnterprise = 0;
                    $document->NameFile = $fileName;
                    $document->save();
                    $detail_document->IdDoc = $document->getKey();
                    $detail_document->IdPro = Auth::user()->email . $PageProcess;
                    $detail_document->save();
                    Alert::Success('¡éxito!','El documento se ha adjuntado correctamente');
                    return redirect('/documentos_proceso/'.$PageProcess);
                }else {
                    Alert::Error('Error','ha ocurrido un error, no se encuentra el archivo, favor de intentar de nuevo en unos momentos');
                    return redirect('/documentos_proceso/'.$PageProcess);
                }
            }catch(Exception $e){
                $error = $e->getMessage();
                Alert::Error('Error',$error);
                return redirect('/documentos_proceso/'.$PageProcess);
            }
        } else if($ProcessUploadDocument == false){
            Alert::Error('No has sido registrado','no te encuentras registrado en el periodo, registrate en el periodo por favor');
            return redirect('/documentos_proceso/'.$PageProcess);
        }
    }
    public function UpdateDocument(){

    }
    public function CancelDocument($PageProcess,$iddoc){
        $documenttocancel = Document::find($iddoc);
        $documenttocancel->delete();
        $documenttocancel->IdStatusDoc = 0;
        $documenttocancel->IdStatusDocAcademic = 0;
        $documenttocancel->IdStatusDocEnterprise = 0;
        $documenttocancel->save();
        Alert::Success('Exito','su documento se ha cancelado');
        return redirect('/documentos_proceso/'.$PageProcess);
    }
    public function SeeObservation(){

    }
    public function SeeDocument($NameFile){
        $path = public_path('documents/' . $NameFile);
        if(File::exists($path)){
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $NameFile . '"',
            ];
    
            return response()->file($path, $headers);
        }else {
            Alert::Error('Error','lo siento, al parecer el archivo se perdio');
            return back();
        }
    }
    public function DownloadFormat($id){
        $downloadedformat=Format::find($id);
        $path=public_path('formats/'.$downloadedformat->NameFile);
        return response()->download($path);
    }
}
