<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail_Document extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "detail_document";

    public function DataBelongProcess(): BelongsTo 
    {
        return $this->belongsTo(Proceso::class, 'IdProceso', 'IdProceso');
    }

    public function DataDocument(){
        return $this->hasOne(Document::class,'IdDocuments','IdDoc');
    }
}
