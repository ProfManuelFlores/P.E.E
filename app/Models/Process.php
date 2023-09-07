<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Process extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function DataTypeProcess(): BelongsTo
    {
        return $this->belongsTo(Type_Process::class, 'IdTypeProcess');
    }
    public function DataEntreprise(){

    }
    public function DataAcademicAdviser(){

    }
    public function DataPeriod(){

    }
    public function DataScore(){
        
    }
}
