<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Scope;

class Process extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "process";
    protected $primaryKey = "IdProcess";

    public function DataDocuments(){
        return $this->hasMany(Detail_Document::class,'IdDoc');
    }
    public function DataTypeProcess(): BelongsTo
    {
        return $this->belongsTo(Type_Process::class, 'IdTypeProcess');
    }
    public function DataEntreprise(): BelongsTo
    {
        return $this->belongsTo(Enterprise_adviser::class, 'IdEnterpriseAdviser');
    }
    public function DataAcademicAdviser(): BelongsTo
    {
        return $this->belongsTo(Academic_adviser::class, 'IdAcademicAdviser');
    }
    public function DataPeriod(): BelongsTo
    {
        return $this->belongsTo(Period::class, 'IdPeriod');
    }
}
