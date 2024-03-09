<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    public function funcionarios(){
        return $this->hasMany(Funcionario::class,'id');
    }

    public function unidadRegional(){
          
        return $this->belongsTo(UnidadRegional::class,'unidad_id');
        
    }
}
