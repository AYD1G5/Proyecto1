@extends('layouts.layout1')
@section('content')
<div class="container">
    <center>	
				<h1>
				 Asignacion Actual 
				</h1>
			</center>
      <div style="float:right">
						<a href="{{url('/finalizarasignacion')}}" class="btn btn-info btn-raised btn">
							Finalizar Asignación
              <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> 
            </a>
      </div>
      <div style="float:right">
						<a href="{{url('/cursosporsemestre/'.$semestre.'/semestre')}}" class="btn btn-warning btn-raised btn">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> 
							Ver Cursos</a>
      </div>
    <div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab">Revisar los cursos asignados actuales</a></li>
						
					</ul>
      <div class="table-responsive">
        <table class="table table-hover text-center">
        <thead>
              <tr>
              <th style="width: 5%"> Codigo </th>
              <th style="width: 15%"> Nombre </th>
              <th style="width: 10%"> Categoria </th>
              <th style="width: 10%"> Creditos </th>
              <th style="width: 10%"> Restriccion </th>
              <th style="width: 10%"> Catedratico </th>
              <th style="width: 10%"> Mostrar </th>
              <th style="width: 10%"> Editar </th>
              <th style="width: 10%"> Agregar </th>
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
                  <td> {{ $curso->nombre_catedratico }} </td>
                  <td>
                  {!! link_to('asignaciontemporal/'.$curso->id_curso_pensum.'/mostrar', 'Mostrar', ['class' => 'btn btn-info btn-raised btn-md']) !!}
                  </td>
                  <td>
                  {!! link_to('editar/'.$semestre.'/'.$curso->id_curso_asig_temp, 'Editar', ['class' => 'btn btn-success btn-raised btn-md']) !!}
                  </td>
                  <td>
                  {!! link_to('eliminar/.$semestre./'.$curso->id_curso_asig_temp, 'Desasignar', ['class' => 'btn btn-danger btn-raised btn-md']) !!}
                  </td>

              </tr>
            @endforeach
        </tbody>
      </table>
      </div>
    </div>
 </div>
 @endsection