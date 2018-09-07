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
    <div style="float:left">
            <a href="{{ url('/curso/material/listarmaterialdeapoyo/'.$curso->id_curso_pensum.'/') }}" 
              class="btn btn-warning btn-raised btn">
            <span class="" aria-hidden="true"></span> 
							Ver material de apoyo</a>
    </div>
  

    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
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
                <tr bgcolor="#03C1E8">
                    <td> {{ $curso->codigo_curso }} </td>
                    <td> {{ $curso->nombre_curso }} </td>
                    <td> {{ $curso->categoria }} </td>
                    <td> {{ $curso->creditos }} </td>
                    <td> {{ $curso->restriccion }} </td>
                </tr>
          </tbody>
        </table>
      </div>
    </div>
    @if(count($prerequisitos) > 0)
    <h1>Pre-requisitos</h1>
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
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
            @foreach ($prerequisitos as $curso1)
            <tr bgcolor="#FFC300">
                <td> {{ $curso1->codigo_curso }} </td>
                <td> {{ $curso1->nombre_curso }} </td>
                <td> {{ $curso1->categoria }} </td>
                <td> {{ $curso1->creditos }} </td>
                <td> {{ $curso1->restriccion }} </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      </div>
    </div>
    @endif

    @if(count($postrequisitos) > 0)
    <h1>Post-requisitos</h1>
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
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
            @foreach ($postrequisitos as $curso1)
            <tr bgcolor="#FFC300">
                <td> {{ $curso1->codigo_curso }} </td>
                <td> {{ $curso1->nombre_curso }} </td>
                <td> {{ $curso1->categoria }} </td>
                <td> {{ $curso1->creditos }} </td>
                <td> {{ $curso1->restriccion }} </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      </div>
    </div>
    @endif
 </div>
 
 @endsection