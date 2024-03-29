<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/', function () {
    return view('dashboard.index');
});*/
Route::get("/", [DashboardController::class, "totalFuncionarios"]);
Route::get("/capital", [DashboardController::class, "totalesCapital"]);
/*Route::get('/', function () {
    return view('vistaUno');
});*/
Route::resource('funcionarios', 'App\Http\Controllers\FuncionarioController');
Route::resource('dependencias', 'App\Http\Controllers\DependenciaController');
/*
Route::get('/texto', function () {
    return 'ESTO ES UN TEXTO DE PRUEBA';
});

Route::get('/arreglo', function () {
    $arreglo = ['lunes','martes','miercoles'];
    return $arreglo;
});

//parámetros
Route::get('/nombre/{nombre?}', function ($nombre='Ingrese nombre') {
    return '<h1> El nombre es: '.$nombre.'</h1>';
});
*/