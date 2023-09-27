<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersManagement extends Controller
{
    public function SeeAllUsers(){
        $allusers = User::all();
        return view('users.admin.users',compact('allusers'));
    }

    public function CreateUserIndividual(Request $request){
        
    }
}
