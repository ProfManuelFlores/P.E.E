<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enterprise extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'enterprise';
    public $primaryKey = 'Rcf';
    public $keyType = 'string';
    
}
