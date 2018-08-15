@extends('layouts.layout1')
@section('content')
 <div class="container">
    @if(Session::has('notice'))
       <div class="alert alert-success">
          {{ Session::get('notice') }}
       </div>
    @endif
    <h1> Listado de cursos disponibles </h1>
    <div class="row">
       <div class="col-lg-2">
          {!! link_to('asignaciones/create', 'Limpiar', ['class' => 'btn btn-primary']) !!}
       </div>
       <div class="col-lg-3">
          {!! link_to('mostrarasignaciontemporal', 'Mostrar Cursos Asignados', ['class' => 'btn btn-primary']) !!}
       </div>
    </div>
    
    <table class="table table-striped table-bordered table-condensed table-hover text-center">
      <thead>
            <tr>
             <th style="width: 5%"> Codigo </th>
             <th style="width: 15%"> Nombre </th>
             <th style="width: 10%"> Categoria </th>
             <th style="width: 10%"> Creditos </th>
             <th style="width: 10%"> Restriccion </th>
             <th style="width: 10%"> Ver </th>
             <th style="width: 10%"> Editar </th>
             <th style="width: 10%"> Agregar/Quitar </th>
            </tr>
       </thead>
       <tbody>
          @foreach ($cursos as $curso)
                @php 
                  $estaasignado = false;
                  $idcursoasignaciontemp = 0;
                @endphp

                @foreach ($listado_asignacion_temporal as $asigt)
                  @if($asigt->id_curso_pensum == $curso->id_curso_pensum)
                    @php 
                      $estaasignado = true;
                      $idcursoasignaciontemp = $asigt->id_curso_asig_temp;
                    @endphp
                    @break
                  @endif
                @endforeach
            <tr class="bg-success">
              <td> {{ $curso->codigo_curso }} </td>
              <td> {{ $curso->nombre_curso }} </td>
              <td> {{ $curso->categoria }} </td>
              <td> {{ $curso->creditos }} </td>
              <td> {{ $curso->restriccion }} </td>
              <td>
                   {!! link_to('asignaciontemporal/'.$curso->id_curso_pensum.'/mostrar', 'Mostrar', ['class' => 'btn btn-primary']) !!}
                </td>

                @if($estaasignado)
                  <td>
                    {!! link_to('asignaciontemporal/'.$idcursoasignaciontemp.'/editar', 'Editar', ['class' => 'btn btn-primary']) !!}
                  </td> 
                  <td>
                  <!--{!! link_to('asignaciontemporal/'.$curso->id_curso_pensum.'/delete', 'Quitar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::open(array('url' => 'asignaciontemporal/' . $curso->id_curso_pensum, 'method' => 'DELETE')) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                  -->
                    {!! Form::open(array('url' => 'asignaciontemporal/' . $idcursoasignaciontemp, 'method' => 'DELETE')) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                @else
                  <td>
                  </td>
                  <td>
                    {!! link_to('asignaciontemporal/'.$curso->id_curso_pensum.'/create', 'Agregar', ['class' => 'btn btn-primary']) !!}                    
                  </td>
                  
                  @endif
             </tr>
          @endforeach
       </tbody>
    </table>

 </div>
 @endsection