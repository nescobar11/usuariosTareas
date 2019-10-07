@extends('layaout')

@section('mycontent')
<div align="right">
	<a href="{{ route('tareas.index') }}" class="btn btn-default">Atrás</a>
</div>
<br/>

<form method="post" action="{{ route('tareas.update', $data->id) }}" autocomplete="off">

	@csrf
	@method('PATCH')
	<div class="form-group">
		<label class="col-md-4 text-right">Nombre Tarea</label>
		<div class="col-md-8">
			<input type="text" name="nombre" value="{{ $data->nombre }}" class="form-control input-lg" />
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<div class="form-group">
		<label class="col-md-4 text-right">Descripcion</label>
		<div class="col-md-8">
            <input type="text" class="form-control input-lg"  id="descripcion" name="descripcion" value="{{ $data->descripcion }}"/>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<div class="form-group">
		<label class="col-md-4 text-right">Fecha</label>
		<div class="col-md-8">
			<input type="date" name="fecha" value="{{ $data->fecha }}" class="form-control input-lg" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group">
		<label class="col-md-4 text-right">Hora</label>
		<div class="col-md-8">
			<input type="text" name="hora" value="{{ $data-> hora }}" class="form-control input-lg" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>
@endsection
