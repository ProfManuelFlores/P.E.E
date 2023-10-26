<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Format;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FormatsManagement extends Controller
{
    public function ChangeFormat(){

    }
    public function UpdateFormat(Request $request,$id){
        try{
            if($request->hasFile('format')){
                $formattochange=Format::find($id);
                $path=public_path().'/formats/'.$formattochange->NameFile;
                $archivo = $request->file('format');
                $keeproute = public_path().'\formats';
                if(File::exists($path)){
                    File::delete($path);
                }
                $archivo->move($keeproute,$_FILES['format']['name']);
                $formattochange->NameFile =$_FILES['format']['name'];
                $formattochange->save();
                Alert::success('Exito!','se ha cambiado el formato '.$formattochange->Name);
                return redirect('/ListFormats');
            }else {
                echo("error, no esta pasando el archivo");
            }
        }catch(Exception $e){
            $error = $e->getMessage();
            dd($error);
        }
    }
}
