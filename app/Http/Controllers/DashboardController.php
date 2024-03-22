<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcionario;
use App\Models\Dependencia;

class DashboardController extends Controller
{
    public function totalFuncionarios()
    {
        // Realizar la consulta a la base de datos
        $totalFuncionarios = Funcionario::count(); // Esto cuenta todos los registros en la tabla correspondiente
        $totalDependencias = Dependencia::count();
        $femeninos = Funcionario::where('sexo','F')->count();
        
        $masculinos = Funcionario::where('sexo', 'M')->count();
        $personalSupe = Funcionario::whereIn('jerarquia_id', [1,2,3,4,5,6,7,8,9])->count();
        $personalSubal = Funcionario::whereIn('jerarquia_id', [10,11,12,13,14,15,16])->count();

        // Pasar el total de registros a la vista
        return view('dashboard.index')
                      ->with('totalFuncionarios', $totalFuncionarios)
											->with('totalDependencias', $totalDependencias)
											->with('femeninos', $femeninos)
											->with('masculinos', $masculinos)
											->with('personalSupe', $personalSupe)
											->with('personalSubal', $personalSubal);
    }
}
