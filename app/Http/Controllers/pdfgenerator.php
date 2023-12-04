<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfgenerator extends Controller
{
    public function generatepdfregister(Request $request){
        $pdf = Pdf::loadView('plantillas.alumno.cedulapdf',compact('request'));
        return $pdf->download();
    }
    public function generatepdfdefinition(){

    }
}
