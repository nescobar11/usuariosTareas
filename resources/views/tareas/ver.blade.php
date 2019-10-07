@extends('layaout')

@section('mycontent')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('tareas.index')}}" class="btn btn-default">Atrás</a>
	</div>
	<br/>
	<h3>Nombre Tarea - {{$data->nombre}}</h3>
	<h3>Descripcion - {{$data->descripcion}}</h3>
	<h3>Fecha - {{$data->fecha}}</h3>
	<h3>Hora - {{$data->hora}}</h3>

</div>
@endsection
