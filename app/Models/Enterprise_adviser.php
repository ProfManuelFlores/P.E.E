<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Enterprise_adviser extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'user';
    public $table = 'enterprise_Adviser';
    public function DataUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }
    public function DataEntreprise():BelongsTo
    {
        return $this->belongsTo(Enterprise::class, 'Rcf');
    }

}
