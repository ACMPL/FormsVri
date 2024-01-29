<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evali extends Model
{
    use HasFactory;
    public function docentes()
    {
        return $this->belongsTo(Docente::class, 'id_docentes');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
