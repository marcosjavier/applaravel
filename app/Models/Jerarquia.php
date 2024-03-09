<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jerarquia extends Model
{
    use HasFactory;

    public function funcionarios(){
        return $this->hasMany(Funcionario::class,'id');
    }
}
