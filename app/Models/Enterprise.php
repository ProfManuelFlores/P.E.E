<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enterprise extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function DataSize(): BelongsTo
    {
        return $this->belongsTo(Size_Enterprise::class, 'IdSize');
    }
    public function DataSociety(): BelongsTo
    {
        return $this->belongsTo(Society::class, 'IdSociety');
    }
}
