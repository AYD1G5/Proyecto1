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
       <div class="col-lg-12">
          {!! link_to('asignaciones/create', 'Crear', ['class' => 'btn btn-primary']) !!}
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
             <th style="width: 10%"> Quitar </th>
            </tr>
       </thead>
       <tbody>
          @foreach ($cursos as $curso)
             <tr>
                <td> {{ $curso->codigo_curso }} </td>
                <td> {{ $curso->nombre_curso }} </td>
                <td> {{ $curso->categoria }} </td>
                <td> {{ $curso->creditos }} </td>
                <td> {{ $curso->restriccion }} </td>
                <td>
                   {!! link_to('asignaciontemporal/'.$curso->id_curso_p.'/sho', 'Mostrar', ['class' => 'btn btn-primary']) !!}
                </td>
                <td>
                   {!! link_to('asignaciontemporal/'.$curso->id_curso_p.'/edit', 'Editar', ['class' => 'btn btn-primary']) !!}
                </td>

                {{ $verdadomentira = false }}
                @foreach ($listado_asignacion_temporal as $asigt)
                  @if($asigt == null && $asigt->codigo_curso != $curso->id_curso_p)
                    {{ $verdadomentira = true }}
                  @endif
                @endforeach

                @if($verdadomentira)
                  <td>
                  {!! link_to('asignaciontemporal/'.$curso->id_curso_p.'/quitar', 'Quitar', ['class' => 'btn btn-danger']) !!}
                    <!--
                    {!! Form::open(array('url' => 'asignaciontemporal/' . $curso->codigo_curso, 'method' => 'DELETE')) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    -->
                  </td>
                  @else
                  <td>
                    {!! link_to('asignaciontemporal/'.$curso->id_curso_p.'/create', 'Agregar', ['class' => 'btn btn-primary']) !!}                    
                  </td>
                  @endif
             </tr>
          @endforeach
       </tbody>
    </table>

    {{$cursos->render()}}
 </div>
 @endsection