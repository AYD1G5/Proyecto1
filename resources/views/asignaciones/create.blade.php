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
            <div class="form-group">
            	<label for="id_curso">Curso</label>
            	<input type="number" id="id_curso_pensum" name="id_curso_pensum" required value="{{ $curso_pensum->id }}" class="form-control" readonly>

			</div>
			<div class="form-group">
				<label>Escoja catedratico</label>
				<select name="catedratico_id" class="form-control">
					@foreach ($catedraticos as $ca)
						<option value="{{$ca->id}}">{{$ca->nombre}}</option>
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