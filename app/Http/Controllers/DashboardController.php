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

    public function totalesCapital()
    {   
        #total de funcionarios en Capital
        $totalFuncCapital = Funcionario::select('funcionarios')
            ->leftjoin('dependencias', 'funcionarios.dependencia_id', '=','dependencias.id')
            ->leftjoin('unidades_regionales', 'dependencias.unidad_id', '=', 'unidades_regionales.id')
            ->where('unidades_regionales.id', '=', 1)->count();

        #total dependencias de Capital
        $totalDepenCapital = Dependencia::where('unidad_id',1)->count();

        #total funcionarios masculinos en Capital
        $total_masc_capital = Funcionario::select('funcionarios')
            ->leftjoin('dependencias', 'funcionarios.dependencia_id', '=','dependencias.id')
            ->leftjoin('unidades_regionales', 'dependencias.unidad_id', '=', 'unidades_regionales.id')
            ->where('unidades_regionales.id', '=', 1)
            ->where(function ($query) {
                $query->where('sexo','=','M');
            })->count();
        
        #total funcionarios femeninos en Capital
        $total_fem_capital = Funcionario::select('funcionarios')
            ->leftjoin('dependencias', 'funcionarios.dependencia_id', '=','dependencias.id')
            ->leftjoin('unidades_regionales', 'dependencias.unidad_id', '=', 'unidades_regionales.id')
            ->where('unidades_regionales.id', '=', 1)
            ->where(function ($query) {
                $query->where('sexo','=','F');
            })->count();
        
        #total de personal Superior en Capital
        $tot_per_super_capital = Funcionario::select('funcionarios')
            ->leftjoin('dependencias', 'funcionarios.dependencia_id', '=','dependencias.id')
            ->leftjoin('unidades_regionales', 'dependencias.unidad_id', '=', 'unidades_regionales.id')
            ->where('unidades_regionales.id', '=', 1)
            ->where(function ($query) {
                $query->whereIn('jerarquia_id', [1,2,3,4,5,6,7,8,9]);
            })->count();
        #total de personal Subalterno en Capital
        $tot_per_subal_capital = Funcionario::select('funcionarios')
            ->leftjoin('dependencias', 'funcionarios.dependencia_id', '=','dependencias.id')
            ->leftjoin('unidades_regionales', 'dependencias.unidad_id', '=', 'unidades_regionales.id')
            ->where('unidades_regionales.id', '=', 1)
            ->where(function ($query) {
                $query->whereIn('jerarquia_id', [10,11,12,13,14,15,16]);
            })->count();

        #llama a las plantillas con las variables obtenidas previamente
        return view('dashboard.totalesCapital')
            ->with('totalFuncCapital', $totalFuncCapital)
            ->with('totalDepenCapital', $totalDepenCapital)
            ->with('total_masc_capital', $total_masc_capital)
            ->with('total_fem_capital', $total_fem_capital)
            ->with('tot_per_super_capital',$tot_per_super_capital)
            ->with('tot_per_subal_capital',$tot_per_subal_capital);
    }
}
