<?php

namespace App\Http\Controllers;
use App\Tareas;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tareas::latest()-> paginate(5);
        return view('tareas', compact('data'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = array(
            'nombre'       =>   $request->nombre,
            'descripcion'   =>   $request->descripcion,
            'fecha'      =>   $request->fecha,
            'hora'       =>   $request->hora,
        );
        tareas::create($form_data);
        return redirect('tareas')->with('success', 'Tarea Agregada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = tareas::findOrFail($id);
        return view('tareas.ver', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tareas::findOrFail($id);
        return view('tareas.edit', compact('data'));
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
        $form_data = array(
            'nombre'      =>   $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'hora'=> $request->hora

        );
        tareas::whereId($id)->update($form_data);
        return redirect('tareas')->with('success', 'Datos de tarea editados exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tareas::findOrFail($id);
        $data->delete();
        return redirect('tareas')->with('success', 'Tarea Eliminado satisfactoriamente');
    }

}
