<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Academic_adviser;
use App\Models\Enterprise;
use App\Models\Enterprise_adviser;
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
        $academic = Academic_adviser::find($request->input('email'));
        $enterpriser = Enterprise_adviser::find($request->input('email'));
        if(Auth::user()->role == 2){
            if($student == true){
                $usertoupdate->First_name = $request->input('first_name');
                $usertoupdate->Last_name = $request->input('last_name');
                $usertoupdate->IdGender = $request->input('genre');
                $student->user = $request->input('email');
                $student->Tuition = $request->input('Tuition');
                $student->Disability = $request->input('Disability');
                $student->Indigenous_Language = $request->input('Indigenous_Language');
                $student->save();
            } elseif($student == false) {
                $student = new Student();
                $usertoupdate->First_name = $request->input('first_name');
                $usertoupdate->Last_name = $request->input('last_name');
                $usertoupdate->IdGender = $request->input('genre');
                $student->user = $request->input('email');
                $student->Tuition = $request->input('Tuition');
                $student->Disability = $request->input('Disability');
                $student->Indigenous_Language = $request->input('Indigenous_Language');
                $student->save();
            }
        }elseif(Auth::user()->role == 3){
            if($enterpriser == true){
                $usertoupdate->First_name = $request->input('first_name');
                $usertoupdate->Last_name = $request->input('last_name');
                $usertoupdate->IdGender = $request->input('genre');
                $enterpriser->user = $request->input('email');
                $enterpriser->IdArea = $request->input('Knowledge');
                $enterpriser->IdDegree = $request->input('Degree');
                $enterpriser->IdEnterprise = $request->input('Enterprise');
                $enterpriser->save();
    
            }elseif($enterpriser == false){
                $enterpriser = new Enterprise_adviser();
                $usertoupdate->First_name = $request->input('first_name');
                $usertoupdate->Last_name = $request->input('last_name');
                $usertoupdate->IdGender = $request->input('genre');
                $enterpriser->user = $request->input('email');
                $enterpriser->IdArea = $request->input('Knowledge');
                $enterpriser->IdDegree = $request->input('Degree');
                $enterpriser->IdEnterprise = $request->input('Enterprise');
                $enterpriser->save();
            }

        }elseif(Auth::user()->role == 4){
            if($academic == true){
                $usertoupdate->First_name = $request->input('first_name');
                $usertoupdate->Last_name = $request->input('last_name');
                $usertoupdate->IdGender = $request->input('genre');
                $academic->user = $request->input('email');
                $academic->IdArea = $request->input('Knowledge');
                $academic->IdDegree = $request->input('Degree');
                $academic->save();
                
            } elseif($academic == false){
                $academic = new Academic_adviser();
                $usertoupdate->First_name = $request->input('first_name');
                $usertoupdate->Last_name = $request->input('last_name');
                $usertoupdate->IdGender = $request->input('genre');
                $academic->user = $request->input('email');
                $academic->IdArea = $request->input('Knowledge');
                $academic->IdDegree = $request->input('Degree');
                $academic->save();
            }
        }
        if(Auth::attempt($credentials)){
            $usertoupdate->save();
            Alert::Success('Exito','Tu perfil se ha actualizado');
            return redirect('/perfil');
        } else {
            Alert::Error('Error','favor de introducir tu contraseña');
            return redirect('/perfil');
        }
    }
}
