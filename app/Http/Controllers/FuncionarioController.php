<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use DataTables;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            /**$funcionarios = DB::table('funcionarios')
                ->join('jerarquias', 'funcionarios.jerarquia_id', '=', 'jerarquias.id')
                ->join('dependencias', 'funcionarios.dependencia_id', '=', 'dependencias.id')
                ->select(['funcionarios.id','apellidos','nombres','dni','credencial','sexo','domicilio',
                            'jerarquias.descripcion AS jerarquia','dependencias.descripcion AS dependencia']);**/
            $funcionarios = DB::select(
            "SELECT funcionarios.id,apellidos,nombres,dni,credencial,sexo,domicilio,j.descripcion AS jerarquia,d.descripcion as dependencia
             FROM funcionarios
                JOIN jerarquias AS j ON funcionarios.jerarquia_id = j.id
                JOIN dependencias AS d ON funcionarios.dependencia_id = d.id;");
            
            /**$funcionarios = Funcionario::query("SELECT funcionarios.id,apellidos,nombres,dni,credencial,sexo,domicilio,j.descripcion AS jerarquia,d.descripcion as dependencia FROM `funcionarios`
            JOIN jerarquias AS j ON funcionarios.jerarquia_id = j.id
            JOIN dependencias AS d ON funcionarios.dependencia_id = d.id;");**/
                return DataTables::of($funcionarios)
                    ->addIndexColumn()
                    ->addColumn('action', function ($funcionario) {                 
                        $showBtn =  '<button ' .
                                        ' class="btn btn-outline-info" ' .
                                        ' onclick="showProject(' . $funcionario->id . ')">Show' .
                                    '</button> '; 
                        $editBtn =  '<button ' .
                                        ' class="btn btn-outline-success" ' .
                                        ' onclick="editProject(' . $funcionario->id . ')">Edit' .
                                    '</button> '; 
                        $deleteBtn =  '<button ' .
                                        ' class="btn btn-outline-danger" ' .
                                        ' onclick="destroyProject(' . $funcionario->id . ')">Delete' .
                                    '</button> ';
        
                        return $showBtn . $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }else
        {
            $funcionarios = Funcionario::all();
            return view('funcionario.index')->with('funcionarios', $funcionarios);
        }
    }

    public function getFuncionarios(Request $request)
    {
        
        if ($request->ajax()) {
            $funcionarios = DB::select("SELECT funcionarios.id,apellidos,nombres,dni,credencial,sexo,domicilio,j.descripcion AS jerarquia,d.descripcion as dependencia FROM funcionarios
            JOIN jerarquias AS j ON funcionarios.jerarquia_id = j.id
            JOIN dependencias AS d ON funcionarios.dependencia_id = d.id;");
            /**$funcionarios = Funcionario::query("SELECT funcionarios.id,apellidos,nombres,dni,credencial,sexo,domicilio,j.descripcion AS jerarquia,d.descripcion as dependencia FROM `funcionarios`
            JOIN jerarquias AS j ON funcionarios.jerarquia_id = j.id
            JOIN dependencias AS d ON funcionarios.dependencia_id = d.id;");*/
                return DataTables::of($funcionarios)
                    ->addColumn('action', function ($funcionario) {                 
                        $showBtn =  '<button ' .
                                        ' class="btn btn-outline-info" ' .
                                        ' onclick="showProject(' . $funcionario->id . ')">Show' .
                                    '</button> '; 
                        $editBtn =  '<button ' .
                                        ' class="btn btn-outline-success" ' .
                                        ' onclick="editProject(' . $funcionario->id . ')">Edit' .
                                    '</button> '; 
                        $deleteBtn =  '<button ' .
                                        ' class="btn btn-outline-danger" ' .
                                        ' onclick="destroyProject(' . $funcionario->id . ')">Delete' .
                                    '</button> ';
        
                        return $showBtn . $editBtn . $deleteBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

        #return view('funcionario.getFuncionarios');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionario();
        $funcionario->apellidos = $request->get('apellidos');
        $funcionario->nombres = $request->get('nombres');
        $funcionario->dni = $request->get('dni');
        $funcionario->credencial = $request->get('credencial');
        $funcionario->sexo = $request->get('sexo');
        $funcionario->domicilio = $request->get('domicilio');
        $funcionario->save();

        return redirect('/funcionarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionario.editar')->with('funcionario', $funcionario);





        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->apellidos = $request->get('apellidos');
        $funcionario->nombres = $request->get('nombres');
        $funcionario->dni = $request->get('dni');
        $funcionario->credencial = $request->get('credencial');
        $funcionario->sexo = $request->get('sexo');
        $funcionario->domicilio = $request->get('domicilio');
        $funcionario->save();

        return redirect('/funcionarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();

    }
}
