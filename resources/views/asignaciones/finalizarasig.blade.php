@extends('layouts.layout1')
@section('content')
<div class="container">
    <center>	
				<h1>
        Asignación Exitosa
				</h1>
			</center>
    
            {!!Form::open(array('url'=>'terminarasignacion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    
        <div class="col-lg-7">
            <div class="form-group row">
                    <label for="id_ciclo" class="col-lg-2 col-form-label text-sm-right">{{ __('Ciclo de la Asignación') }}</label>
                    <div class="col-lg-4">
                         <select id="id_ciclo" class="btn btn-info btn-raised form-control{{ $errors->has('id_ciclo') ? ' is-invalid' : '' }}" 
                         name="id_ciclo" value="{{ old('id_ciclo') }}" required>
			                @foreach ($ciclos as $ciclo)
	    		                <option value="{{$ciclo->id_ciclo}}">&nbsp&nbsp&nbsp{{$ciclo->nombre_ciclo}}</option>
			                @endforeach
		                </select>

                        @if ($errors->has('ciclos'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ciclos') }}</strong>
                            </span>
                        @endif
                    </div>
                    <label for="id_ciclo" class="col-lg-2 col-form-label text-sm-right">{{ __('Año de la Asignación') }}</label>
                    <div class="col-lg-3">     
                        <select id="anio" class="btn btn-success btn-raised form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" 
                        name="anio" value="{{ old('anio') }}" required>
                            @for ($year=1990; $year <= 2019; $year++)
                            <option value="{{ $year }}">&nbsp&nbsp&nbsp{{$year}}</option>
                            @endfor
                        </select>
                    </div>
            </div>
        </div>
        <div class="col-lg-5">   
                            <a href="{{url('/revisarasignacion/1')}}" class="btn btn-danger btn-raised btn">
                                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 
						            Revisar Asignación
                                </a>
                              <button type="submit" class="btn btn-info btn-raised btn" id="finalizarasignacion">
                                     Finalizar Asignación
                                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> 
                               </button>
            </div>    
            {!!Form::close()!!}	
    
    
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
        <thead>
              <tr>
              <th style="width: 5%"> Codigo </th>
              <th style="width: 10%"> Nombre </th>
              <th style="width: 5%"> Categoria </th>
              <th style="width: 2%"> Creditos </th>
              <th style="width: 2%"> Restriccion </th>
              <th style="width: 3%"> Nota Curso </th>
              <th style="width: 15%"> Dificultad</th>
              <th style="width: 10%"> Catedratico </th>

              <th style="width: 2%"> Encuesta Profesor</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr bgcolor="#FFC300">
                  <td> {{ $curso->codigo_curso }} </td>
                  <td> {{ $curso->nombre_curso }} </td>
                  <td> {{ $curso->categoria }} </td>
                  <td> {{ $curso->creditos }} </td>
                  <td> {{ $curso->restriccion }} </td>
                  <td> 
                      {!! Form::open(array('route' => array('notacurso', $curso->id_curso_asig_temp))) !!}
                        {!! Form::number('nota', $curso->nota, ['min'=>0,'max'=>100]) !!}
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-info btn-xs', 'id'=>'actualizarnota']) !!}
                      {!! Form::close() !!}
                  </td>
                  <td>
                    <p style="display:none;">
                    {{$curso->no_estrellas}}estrellas
                    </p>
                    <?php $tamano=5; ?>
                    @for ($i = 1; $i <= $tamano; $i++)
                        @if ($i <= $curso->no_estrellas)
                          <a href="{{url('puntearcurso/'.$curso->id_curso_asig_temp.'/'.$i)}}" id="estrellallena{{$i}}"><img src="{{ URL::asset('img/full.png') }}" id="estrellallena"></a>        
                        @else
                          <a href="{{url('puntearcurso/'.$curso->id_curso_asig_temp.'/'.$i)}}" id="estrellavacia{{$i}}"><img src="{{ URL::asset('img/empty.png') }}" id="estrellavacia"></a>        
                        @endif
                    @endfor
                  </td>
                  <td> {{ $curso->nombre_catedratico }} </td>
                  <td>
                  {!! link_to('encuesta/'.$curso->id_curso_pensum.'/'.$curso->id_catedratico, 'Realizar', ['class' => 'btn btn-success btn-raised btn-md']) !!}
                  </td>


              </tr>
            @endforeach
        </tbody>
      </table>
      </div>
    </div>
 </div>
 @endsection