<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Academic_adviser extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'academic_adviser';
    public $primaryKey = 'user';
    public $keyType = 'string';
    protected $fillable = [
        'user',
        'IdAcademicAdvisor'
    ];
    public function DataUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }
    public function DataAreaknowledge():BelongsTo 
    {
        return $this->belongsTo(Area_Knowledge::class, 'IdArea');
    }
}
