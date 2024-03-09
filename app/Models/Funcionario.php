<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    public function dependencia(){
          
        return $this->belongsTo(Dependencia::class,'dependencia_id');
        
    }

    public function jerarquia(){
          
        return $this->belongsTo(Jerarquia::class,'jerarquia_id');
        
    }
}
