<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;
use RealRashid\SweetAlert\Facades\Alert;

class UsersManagement extends Controller
{
    public function SeeAllUsers(){
        $allusers = User::all();
        return view('users.admin.users',compact('allusers'));
    }

    public function UpdateDataUser(Request $request){
        try{
            $this->validate(request(), [
                'role'  => 'numeric',
                'password' => ['min:8'],
            ]);
            $userUpdate = User::find(request(['email']))->first();
            $userUpdate->role = request('role');
            $userUpdate->password = request('password');
            $userUpdate->save();
            return redirect('/ListUser')->with('sucess','se ha modificado los datos con exito');
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect('/ListUser')->with('error',$error);
        }
    }

    public function StatusUser(Request $request){
        $userUpdateStatus = User::find(request(['email']))->first();
        
    }

    public function CreateUserIndividual(Request $request){
        try{
            $this->validate(request(), [
                'role'  => 'required|numeric',
                'email' => 'required|unique:users',
                'password' => ['required','min:8'],
            ]);
            $result = User::create(request(['email','role','password']));
            return redirect('/ListUser')->with('sucess','se ha creado el usuario con exito');
        } catch(Exception $e) {
            $error = $e->getMessage();
            return redirect('/ListUser')->with('error',$error);
        }
    }

    public function CreateUsersMassive(Request $request){
        try {
            if ($request->hasFile('CSV')) {
                set_time_limit(0);
                $csv = Reader::createFromPath($request->file('CSV')->path());
                $csv->setHeaderOffset(0);
                $batchSize = 1000; // Número de filas a procesar en cada lote
                $records = $csv->getRecords();
                $batch = [];
                $rowCount = 0;
        
                foreach ($records as $record) {
                    User::firstOrCreate(
                        ['email' => $record['email']],
                        [
                            'role' => $record['rol'],
                            'password' => Hash::make($record['matricula'])
                        ]
                    );
        
                    $rowCount++;
        
                    if ($rowCount == $batchSize) {
                        $rowCount = 0;
                    }
                }
        
                Alert::Success('Éxito', 'Todos los usuarios han sido agregados');
                return redirect('/ListUser');
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            Alert::Error('Error', $error);
            return redirect('/ListUser');
        }
    }
}
