<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;

class UsersManagement extends Controller
{
    public function SeeAllUsers(){
        $allusers = User::all();
        return view('users.admin.users',compact('allusers'));
    }

    public function SeeOneDataUser(Request $request){
        
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
        try{
            if($request->hasFile('CSV')){
                $csv = Reader::createFromPath($request->file('CSV')->path());
                $csv->setHeaderOffset(0);
                $batchSize = 1000; // Número de filas a procesar en cada lote
                $records = $csv->getRecords();
                $batch = [];
                $rowCount = 0;
                foreach($records as $record){
                    $usuario = User::where('email', $record['email'])->first();
                    if(!$usuario){
                        $batch[] = [
                            'email' => $record['email'],
                            'rol' => $record['rol'],
                            'password' => bcrypt($record['matricula'])
                        ];
                    }
                    $rowCount++;
                    if($rowCount == $batchSize){
                        User::insert($batch);
                        $rowCount = 0;
                    }
                }
                if ($rowCount > 0) {
                    User::insert($batch);
                }
                return redirect('/ListUser')->with('sucess','Los usuarios han sido agregados con exito!');
            }
        } catch (Exception $e){
            $error = $e->getMessage();
            return redirect('/ListUser')->with('error',$error);
        }
    }
}
