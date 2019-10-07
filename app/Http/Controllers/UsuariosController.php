<?php

namespace App\Http\Controllers;
use App\UsuarioR;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = usuariosR::latest()-> paginate(5);
        return view('usuarios', compact('data'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            'nombre_completo'       =>   $request->nombre_completo,
            'correo'   =>   $request->correo,
            'tareas'      =>   $request->tareas,

        );
        tareas::create($form_data);
        return redirect('usuarios')->with('success', 'usuario Agregada Exitosamente');
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
        return view('usuarios.ver', compact('data'));
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
        return view('usuarios.edit', compact('data'));
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
            'nombre_completo'  =>   $request->nombre_completo,
            'correo'   =>   $request->correo,
            'tareas'  =>   $request->tareas,
        );
        tareas::whereId($id)->update($form_data);
        return redirect('usuarios')->with('success', 'Datos de usuario editados exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = usuariosR::findOrFail($id);
        $data->delete();
        return redirect('usuarios')->with('success', 'usuario Eliminado satisfactoriamente');
    }

}
