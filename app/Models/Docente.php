<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    public function piarticulos(){
        return $this->hasMany(Piarticulo::class, 'id');
    }
    public function pidocumentos(){
        return $this->hasMany(Pidocumento::class, 'id');
    }
    public function frhtesis(){
        return $this->hasMany(Frhtesi::class, 'id');
    }
    public function frhlibros(){
        return $this->hasMany(Frhlibro::class, 'id');
    }
    public function gesis(){
        return $this->hasMany(Gesi::class, 'id');
    }
    public function pgi1s(){
        return $this->hasMany(Pgi1::class, 'id');
    }
    public function pgi2s(){
        return $this->hasMany(Pgi2::class, 'id');
    }
    public function evalis(){
        return $this->hasMany(Evali::class, 'id');
    }
}
