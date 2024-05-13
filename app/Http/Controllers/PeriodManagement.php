<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodManagement extends Controller
{
    public function CreatePeriod(){
        try{
            $date = Carbon::now();
            $year = $date->year;
            $month = $date->month;
            if ($month >= 1 && $month <= 4) {
                $quarter = '01';
            } elseif ($month >= 5 && $month <= 8) {
                $quarter = '02';
            } else {
                $quarter = '03';
            }
            $idp = $year . $quarter;
            $period = new Period;
            $period->IdPeriod = $idp;
            $period->Phase1 = 0;
            $period->Phase2 = 0;
            $period->Phase3 = 0;
            $period->save();
            return redirect('/ListPeriod');
        }catch (Exception $e){
            $error = $e->getMessage();
            Alert::Error('error','al parecer el periodo ya esta iniciado');
        }
    }
    public function ChangeStatusSubPeriod($id, $subperiod){
        $PeriodToChange = Period::find($id);
        try{
            switch ($subperiod) {
                case 1:
                    $PeriodToChange->Phase1 = $PeriodToChange->Phase1 ? 0:1;
                    break;
                case 2:
                    $PeriodToChange->Phase2 = $PeriodToChange->Phase2 ? 0:1;
                    break;
                case 3:
                    $PeriodToChange->Phase3 = $PeriodToChange->Phase3 ? 0:1;
                    break;
                default:
                    echo('error');
                    break;
            }
            
            $result = $PeriodToChange->save();
            Alert::Success('EXITO','Se ha cambiado el periodo');
            return redirect('/ListPeriod')->with('sucess','sucess');
        }catch (Exception $e){
            $error = $e->getMessage();
            Alert::Error('error',$error);
            return redirect('/ListPeriod')->with('error',$error);
        }
    }
}
