<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacant extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function DataEnterprise():BelongsTo
    {
        return $this->belongsTo(Enterprise::class, 'Rfc');
    }
}
