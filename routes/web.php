<?php

use App\Http\Controllers\Estancia;
use App\Http\Controllers\FormatsManagement;
use App\Http\Controllers\PeriodManagement;
use App\Http\Controllers\UsersManagement;
use App\Models\Format;
use App\Models\Period;
use App\Models\Process;
use App\Models\StatusDoc;
use App\Models\Type_Process;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
------------------------------------------
|                 login                  |
------------------------------------------
*/

    Route::get('/inicio_admin',function(){
        return view('users.admin.inicio-admin');
    })->name('admin')->middleware('admin');

    Route::get('/inicio_alumno', function(){
        $procesos=Type_Process::all();
        $formatos=Format::where('Name','Guia de uso')->first();
        return view('users.alumno.inicio-alumno',compact('procesos','formatos'));
    })->name('alumno')->middleware('alumno');

    Route::get('/inicio_empresa',function(){
        return view('users.empresa.inicio-empresa');
    })->name('empresa')->middleware('empresa');

    Route::get('/inicio_asesor-academico',function(){
        return view('users.asesor-academico.asesoracademico');
    })->name('asesor-academico')->middleware('asesoracademico');

/*
------------------------------------------
|              Functions                 |
------------------------------------------
*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/CreateNewUser', [UsersManagement::class, 'CreateUserIndividual'])
->name('CreateUserIn')
->middleware('admin');

Route::get('/CreateNewPeriod', [PeriodManagement::class, 'CreatePeriod'])
->name('CreatePeriod')
->middleware('admin');

Route::get('/UpdatePeriod/{id}/{subperiod}', [PeriodManagement::class, 'ChangeStatusSubPeriod'])
->name('UpdatePeriod')
->middleware('admin');

Route::post('/UpdateUser', [UsersManagement::class, 'UpdateDataUser'])
->name('UpdateUser')
->middleware('admin');

Route::post('/UpdateFormat/{id}', [FormatsManagement::class, 'UpdateFormat'])
->name('UpdateFormat')
->middleware('admin');

Route::get('/descargar_formato/{id}', [Estancia::class, 'DownloadFormat'])
->name('Descargar_formato');

Route::get('/SingupPeriod/{PageProcess}', [Estancia::class, 'SignupPeriod'])
->name('SingupPeriod')
->middleware('alumno');

Route::post('/UploadDocument/{PageProcess}',[Estancia::class, 'UploadDocument'])
->name('UploadDocument')
->middleware('alumno');

Route::get('/seeDocument/{NameFile}',[Estancia::class, 'SeeDocument'])
->name('SeeDocument')
->middleware('alumno');

/*
------------------------------------------
|             Redirections               |
------------------------------------------
*/

Route::get('/ListUser', [UsersManagement::class, 'SeeAllUsers'])
->name('SeeAllUsersRoute')
->middleware('admin');

Route::get('/ListFormats',  function(){
    $formatos=Format::all();
    return view('users.admin.formatmanagement',compact('formatos'));
})->name('formats')->middleware('admin');

Route::get('/ListPeriod',  function(){
    $periodos=Period::all();
    return view('users.admin.periodsmanagement',compact('periodos'));
})->name('periods')->middleware('admin');

Route::get('/documentos_proceso/{IdProcess}', function($IdProcess){
    $formatos=TypeDocument::all();
    $proceso=Type_Process::find($IdProcess);
    $ProcesoAlumno=Process::find(Auth::user()->email . $IdProcess);
    $DocumentosAlumno=DB::table('document')
    ->join('detail_document', 'document.IdDocuments', "=", 'detail_document.IdDoc')
    ->join('process', 'process.IdProcess', "=", "detail_document.IdPro")
    ->where('IdTypeProcess', $IdProcess)
    ->where('IdPro', Auth::user()->email . $IdProcess)
    ->get();
    $processperiod = Period::find($ProcesoAlumno->IdPeriod);
    $statusDoc=StatusDoc::all();
    if($ProcesoAlumno==true){
        return view('users.alumno.documentos',compact('formatos','proceso','ProcesoAlumno','DocumentosAlumno','statusDoc','processperiod'));
    } else{
        return view('users.alumno.documentos',compact('formatos','proceso'));
    }
})->name('documentos_alumno')->middleware('alumno');