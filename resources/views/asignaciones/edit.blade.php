@extends('layouts.layout1')
@section('content')
 <div class="container">
 <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($asignacion_temporal,['method'=>'PATCH','route'=>['asignaciontemporal.update', $asignacion_temporal]])!!}
            {{Form::token()}}
			<div class="invisible">
            	<input type="number" id="id_curso_pensum" name="id_curso_pensum" required value="{{ $curso_pensum->id_curso_pensum }}" readonly>
			</div>
			<h3>Codigo: {{ $curso->codigo_curso }}</h3>
			<h4>Nombre: {{ $curso->nombre_curso }}</h4>
			<div class="form-group">
				<label>Escoja catedratico</label>
				<select name="id_catedratico" class="form-control" id="id_catedratico">
					@foreach ($catedraticos as $ca)
						@if($ca->id == $asignacion_temporal->id_catedratico)
							<option value="{{$ca->id}}" selected>{{$ca->nombre}}</option>
						@else
							<option value="{{$ca->id}}">{{$ca->nombre}}</option>
						@endif
					@endforeach
				</select>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Reset</button>
            </div>

            {!!Form::close()!!}		
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                        <a href="{{ url('asignaciontemporal') }}">
                            <button class="btn btn-info"> Volver al Listado </button>
                        </a>
                    </div>
                </div>
		</div>
</div>
 </div>
@endsection