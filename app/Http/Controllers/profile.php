<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class profile extends Controller
{
    public function ChangePassword(Request $request){
        ConfirmDelete('seguro?', '¿desea cambiar su contraseña?');
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:8'
        ]);
        $request->validate([
            'newpass' => 'required|min:8',
        ]);
        if(Auth::attempt($credentials)){
            $usertoupdate = User::find($request->input('email'));
            $usertoupdate->password = Hash::make($request->input('newpass'));
            $usertoupdate->save();
            Alert::Success('Exito','Su contraseña ha sido cambiada');
            return redirect('/perfil');
        }else {
            Alert::Error('Error','contraseña erronea, favor de introducir su contraseña actual correctamente para poder realizar el cambio');
            return redirect('/perfil');
        }
    }

    public function UpdateDataUser(Request $request){
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required'
        ]);
        $usertoupdate = User::find($request->input('email'));
        $student = Student::find($request->input('email'));
        if($student == true){
            $usertoupdate->First_name = $request->input('first_name');
            $usertoupdate->Last_name = $request->input('last_name');
            $usertoupdate->IdGender = $request->input('');
            $student->user = $request->input('email');
            $student->Tuition = $request->input('Tuition');
            $student->Disability = $request->input('Disability');
            $student->Indigenous_Language = $request->input('Indigenous_Language');
        } else {
            $student = new Student();
            $usertoupdate->First_name = $request->input('first_name');
            $usertoupdate->Last_name = $request->input('last_name');
            $student->user = $request->input('email');
            $student->Tuition = $request->input('Tuition');
            $student->Disability = $request->input('Disability');
            $student->Indigenous_Language = $request->input('Indigenous_Language');
        }
        if(Auth::attempt($credentials)){
            $student->save();
            $usertoupdate->save();
            Alert::Success('Exito','Tu perfil se ha actualizado');
            return redirect('/perfil');
        } else {
            Alert::Error('Error','favor de introducir tu contraseña');
            return redirect('/perfil');
        }
    }
}
