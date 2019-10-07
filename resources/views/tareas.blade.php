@extends('layaout')
@section('title', 'tareas')
@section('menu_tareas', 'active')
@section('mycontent')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


    <h2>Mis Tareas</h2>
    <div align="right">
        <a href="{{ route('tareas.create')}}" class="btn btn-default">Agregar</a>
    </div>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="15%">Nombre Tarea</th>
            <th width="15%">Descripcion</th>
            <th width="20%">Fecha</th>
            <th width="15%">Hora</th>
            <th width="38%">Acción</th>
        </tr>
        @foreach($data as $row)

            <tr>
                <td>{{ $row->nombre}}</td>
                <td>{{ $row->descripcion}}</td>
                <td>{{ $row->fecha}}</td>
                <td>{{ $row->hora}}</td>
                <td>
                    <form action="{{ route('tareas.destroy', $row->id) }}" method="post">
                        <a href="{{ route('tareas.show', $row->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('tareas.edit', $row->id) }}" class="btn btn-warning">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    {!! $data->links() !!}
@endsection
