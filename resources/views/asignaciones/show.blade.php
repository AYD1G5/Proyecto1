@extends('layouts.layout1')
@section('content')
 <div class="container">
    @if(Session::has('notice'))
       <div class="alert alert-success">
          {{ Session::get('notice') }}
       </div>
    @endif
		<h1>Nombre: {{ $curso->nombre_curso }}</h1>
    <a href="{{ url('asignaciontemporal') }}">
                            <button class="btn btn-info"> Volver al Listado </button>
    </a>
    <table class="table table-striped table-bordered table-condensed table-hover text-center">
      <thead>
            <tr>
             <th style="width: 5%"> Codigo </th>
             <th style="width: 15%"> Nombre </th>
             <th style="width: 10%"> Categoria </th>
             <th style="width: 10%"> Creditos </th>
             <th style="width: 10%"> Restriccion </th>
            </tr>
       </thead>
       <tbody>
             <tr>
                <td> {{ $curso->codigo_curso }} </td>
                <td> {{ $curso->nombre_curso }} </td>
                <td> {{ $curso->categoria }} </td>
                <td> {{ $curso->creditos }} </td>
                <td> {{ $curso->restriccion }} </td>
             </tr>
       </tbody>
    </table>
 </div>
 @endsection