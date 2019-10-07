@extends('layaout')


@section('mycontent')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h2>Crear Tareas</h2>

<div align="right">
    <a href="{{route('tareas.index')}}" class="btn btn-default">Atrás</a>
</div>

<form method="post" action="{{route('tareas.store')}}" autocomplete="off">

    @csrf
    <div class="form-group">
        <label class="col-md-4 text-right">Nombre Tarea</label>
        <div class="col-md-8">
            <input type="text" name="nombre" class="form-control input-lg"/>
        </div>

    </div>
    <div class="form-group">
        <label class="col-md-4 text-right">Descripción</label>
        <div class="col-md-8">
            <input type="text" class="form-control input-lg"  id="descripcion" name="descripcion" value="{{ $data->descripcion }}"/>
            {{-- <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea> --}}
        </div>

    </div>
    <div class="form-group">
        <label class="col-md-4 text-right">Fecha</label>
        <div class="col-md-8">
            <input type="date" name="fecha" class="form-control input-lg"/>
        </div>

    </div>
    <div class="form-group">
        <label class="col-md-4 text-right">Hora</label>
        <div class="col-md-8">
            <input type="time" name="hora" class="form-control input-lg"/>
        </div>
    </div>


    <br/><br /> <br/>
    <div class="form-group text-center">
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Add">

    </div>


</form>
@endsection
