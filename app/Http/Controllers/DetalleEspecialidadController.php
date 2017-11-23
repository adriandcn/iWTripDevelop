<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Models\Booking\Detalle_Especialidad;

class DetalleEspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Detalle_Especialidad::all();
    }
    
    public function buscar($id){
        
            $buscar = Detalle_Especialidad::where('id_especialidad','=',$id)->get();
            return $buscar;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especialidad = Detalle_Especialidad::create(Request::all());
        return $especialidad;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidad = Detalle_Especialidad::find($id);
        return $especialidad;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id){
                $especialidad = Detalle_Especialidad::find($id);
		$especialidad->id_especialidad = Request::input('id_especialidad');
                $especialidad->fecha_inicio = Request::input('fecha_inicio');
                $especialidad->fecha_fin = Request::input('fecha_fin');
                $especialidad->hora_inicio = Request::input('hora_inicio');
                $especialidad->hora_fin = Request::input('hora_fin');
                $especialidad->numero_reservas = Request::input('numero_reservas');
                $especialidad->precio = Request::input('precio');
                $especialidad->descuento = Request::input('descuento');
                $especialidad->bookeable = Request::input('bookeable');
                $especialidad->activo = Request::input('activo');
                $especialidad->descripcion = Request::input('descripcion');
                $especialidad->save();
                return $especialidad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidad = Detalle_Especialidad::find($id);
	$especialidad->delete();
    }
}
