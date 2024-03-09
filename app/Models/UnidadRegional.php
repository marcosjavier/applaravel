<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadRegional extends Model
{
    use HasFactory;
    protected $table = "unidades_regionales";// <-- El nombre personalizado

    public function dependencias(){
        return $this->hasMany(Dependencia::class,'id');
    }
}
