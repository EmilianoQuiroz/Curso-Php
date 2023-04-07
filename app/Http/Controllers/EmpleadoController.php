<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta de la info de la base de datos
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creacion de empleado
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recolecta toda la informacion del empleado
        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');

            // Condicional para la carga de imagenes
            if($request->hasFile('Foto')){
                $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
            }

        Empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Edicion de empleados
        $empleado=Empleado::findOrFail($id);

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Recepcionamos todos los datos a excepcion del token y el metodo
        $datosEmpleado = request()->except(['_token','_method']);
        Empleado::where('id','=',$id)->update($datosEmpleado);

        // Con esto regresamos al formulario luego del update
        $empleado=Empleado::findOrFail($id);

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param \App\Models\Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado');
    }
}
