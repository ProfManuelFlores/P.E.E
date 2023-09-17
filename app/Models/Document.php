<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function DataTypeDoc(): BelongsTo
    {
        return $this->belongsTo(TypeDocument::class, 'IdTypeDoc');
    }
    public function DataStatusDoc(): BelongsTo
    {
        return $this->belongsTo(StatusDoc::class,'IdStatusDoc');
    }
}
