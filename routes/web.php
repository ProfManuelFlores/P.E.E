<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
        return view('users.alumno.inicio-alumno');
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
