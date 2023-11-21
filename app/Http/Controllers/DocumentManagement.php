<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailManager;
use App\Models\Document;
use App\Models\StatusDoc;
use App\Models\TypeDocument;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;

class DocumentManagement extends Controller
{
    public function findAllDocuments($idprocess,$user){
        $user;
        $documents=DB::table('document')
        ->join('detail_document', 'document.IdDocuments', "=", 'detail_document.IdDoc')
        ->join('process', 'process.IdProcess', "=", "detail_document.IdPro")
        ->where('IdPro', $idprocess)
        ->where('deleted_at', null)
        ->get();
        $documentsCanceled=DB::table('document')
        ->join('detail_document', 'document.IdDocuments', "=", 'detail_document.IdDoc')
        ->join('process', 'process.IdProcess', "=", "detail_document.IdPro")
        ->where('IdPro', $idprocess)
        ->where('deleted_at','!=',null)
        ->get();
        $typedocuments = TypeDocument::all();
        $statusdoc = StatusDoc::all();
        return view('users.admin.documentsStudent', compact('documents','typedocuments','statusdoc','documentsCanceled','user'));
    }

    public function ChangeStatus(Request $request,$iddoc,$statedesire){
        $documenttochangestatus = Document::find($iddoc);
        if($this->middleware('admin')){
            switch ($statedesire) {
                case 0:
                    $documenttochangestatus->IdStatusDoc = 0;
                    break;
                case 1:
                    $documenttochangestatus->IdStatusDoc = 1;
                    break;
                case 2:
                    $comment = $documenttochangestatus->comment;
                    Alert::Info('Observacion',$comment);
                    return back();
                    break;
                default:
    
                    break;
            }
        }
        if($this->middleware('asesoracademico')){
            switch ($statedesire) {
                case 0:
                    $documenttochangestatus->IdStatusDocAcademic = 0;
                    break;
                case 1:
                    $documenttochangestatus->IdStatusDocAcademic = 1;
                    break;
                case 2:
                    $comment = $documenttochangestatus->comment_Academic;
                    Alert::Info('Observacion',$comment);
                    return back();
                    break;
                default:
            }
        }
        if($this->middleware('empresa')){
            switch ($statedesire) {
                case 0:
                    $documenttochangestatus->IdStatusDocEnterprise = 0;
                    break;
                case 1:
                    $documenttochangestatus->IdStatusDocEnterprise = 1;
                    break;
                case 2:
                    $comment = $documenttochangestatus->comment_Enterprise;
                    Alert::Info('Observacion',$comment);
                    return back();
                    break;
                default:
            }
        }
        $documenttochangestatus->save();
        Mail::to($request->user())->send(new EmailManager($documenttochangestatus));
        Alert::success('exito','se ha cambiado el estado del documento');
        return back();
    }
    public function DoObservation(Request $request, $iddoc){
        try{
            $documenttocomment = Document::find($iddoc);
            if(Auth::user()->role == 1){
                $documenttocomment->comment = $request->input('comment');
                $documenttocomment->IdStatusDoc = 2;
            }
            if(Auth::user()->role == 3){
                $documenttocomment->comment_Enterprise = $request->input('comment2');
                $documenttocomment->IdStatusDocEnterprise = 2;
            }
            if(Auth::user()->role == 4){
                $documenttocomment->comment_Academic = $request->input('comment3');
                $documenttocomment->IdStatusDocAcademic = 2;
            }
            $documenttocomment->save();
            Alert::Success('exito','se ha guardado el comentario');
            Mail::to($request->user())->send(new EmailManager($documenttocomment));
            return back();
        }catch (Exception $e){
            $error = $e->getMessage();
            Alert::Error('Error',$error);
            return back();
        }
    }
}
