<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enterprise;
use Exception;
use Illuminate\Http\Request;
use LDAP\Result;
use League\Csv\Reader;
use RealRashid\SweetAlert\Facades\Alert;

class enterpriseManagement extends Controller
{
    public function UpdateEnterprise(Request $request, $rcf){
        try{
            $enterpriseupdate = Enterprise::find($rcf);
            $enterpriseupdate->IdSize = Request('size');
            $enterpriseupdate->IdSociety = Request('society');
            $enterpriseupdate->WebPage = Request('WebPage');
            $enterpriseupdate->Name = Request('Name');
            $enterpriseupdate->Rcf = Request('Rcf');
            $enterpriseupdate->Name = Request('Name');
            $enterpriseupdate->Address  = Request('Address');
            $enterpriseupdate->Email = Request('Email');
            $enterpriseupdate->Phone_Number = Request('Phone_Number');
            $enterpriseupdate->save();
            Alert::Success('Exito','los datos de la empresa han sido actualizados');
            return redirect('/EnterpriseManagement');
        } catch(Exception $e){
            $error = $e->getMessage();
            Alert::Success('Error','los datos de la empresa no pudieron ser actualizados, intente mas tarde');
            return redirect('/EnterpriseManagement');
        }
    }

    public function UploadEnterpriseMassive(Request $request){
        try{
            if($request->hasFile('CSV_E')){
                set_time_limit(0);
                $csv = Reader::createFromPath($request->file('CSV_E')->path());
                $csv->setHeaderOffset(0);
                $batchSize = 1000;
                $records = $csv->getRecords();
                $batch = [];
                $rowCount = 0;
                foreach($records as $record){
                    Enterprise::firstOrCreate([
                        'Rcf' => $record['Identificador'],
                        'Name' => $record['nombre']
                    ]);
                    $rowCount++;
                    if($rowCount == $batchSize){
                        $rowCount = 0;
                    }
                }

                Alert::Success('Exito','Las empresas han sido ingresadas correctamente');
                return redirect('/EnterpriseManagement');
            }
        } catch(Exception $e){
            $error = $e->getMessage();
            Alert::Error('Error', $error);
            return redirect('/EnterpriseManagement');
        }
    }
}
