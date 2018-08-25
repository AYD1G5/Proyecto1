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

			{!!Form::open(array('url'=>'asignaciontemporal','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="invisible">	
            	<input type="number" id="id_curso_pensum" name="id_curso_pensum" required value="{{ $curso_pensum->id_curso_pensum }}">
            	<input type="number" id="id_semestre" name="id_semestre" required value="{{ $id_semestre }}">
			</div>
			<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab">Asignar Curso</a></li>
			</ul>
			<h3>Codigo: {{ $curso->codigo_curso }}</h3>
			<h4>Nombre: {{ $curso->nombre_curso }}</h4>
			<div class="form-group">
				<label>Escoja catedratico</label>
				<select name="id_catedratico" class="form-control">
					@foreach ($catedraticos as $ca)
						<option value="{{$ca->id}}">{{$ca->nombre}}</option>
					@endforeach
				</select>
            </div>
            <div class="form-group">
				<button  class=" btn-success btn-raised btn-md" type="submit">Guardar</button>
            </div>
            {!!Form::close()!!}		
                <div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<a href="{{url('cursosporsemestre/'.$id_semestre.'/semestre')}}">
						<button class="btn-warning btn-raised btn-xl"> Volver al Listado </button>
                        </a>
                    </div>
                </div>
		</div>
</div>
 </div>
@endsection