<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'student';
    protected $primaryKey = 'user';
    public function Datacarrier(){
        return $this->hasOne(carrier::class);
    }

    public function DataUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user' , 'email');
    }
}

