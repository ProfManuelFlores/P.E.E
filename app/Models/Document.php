<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $table = "document";
    protected $primaryKey = "IdDocuments";

    public function detalledoc()
    {
        return $this->hasOne(Detail_Document::class, 'IdDoc', 'IdDoc');
    }
}