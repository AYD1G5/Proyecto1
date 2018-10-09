@extends('layouts.layout1')
@section('content')
 <div class="container">
    @if(Session::has('notice'))
       <div class="alert alert-success">
          {{ Session::get('notice') }}
       </div>
    @endif
		
    <a href="{{ url('asignaciontemporal') }}">
    <button class="btn btn-info"> Volver al Listado </button>
    </a>
    <div style="float:left">
            <a href="{{ url('/curso/material/listarmaterialdeapoyo/'.$curso->id_curso_pensum.'/') }}" 
              class="btn btn-warning btn-raised btn">
            <span class="" aria-hidden="true"></span> 
							Ver material de apoyo</a>
    </div>
    <div style="float:left">
            <a href="{{ url('/CrearTemas/'.$curso->id_curso_pensum.'/') }}" 
              class="btn btn-warning btn-raised btn">
            <span class="" aria-hidden="true"></span> 
							Crear Tema</a>
    </div>
  
    <h1>Nombre: {{ $curso->nombre_curso }}</h1>
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-hover text-center">
          <thead>
                <tr>
                <th style="width: 5%"> Codigo </th>
                <th style="width: 15%"> Nombre </th>
                <th style="width: 10%"> Categoria </th>
                <th style="width: 10%"> Creditos </th>
                <th style="width: 15%"> Dificultad </th>
                <th style="width: 10%"> Restriccion </th>
                </tr>
          </thead>
          <tbody>
                <tr bgcolor="#03C1E8">
                    <td> {{ $curso->codigo_curso }} </td>
                    <td> {{ $curso->nombre_curso }} </td>
                    <td> {{ $curso->categoria }} </td>
                    <td> {{ $curso->creditos }} </td>
                    <td>
													<?php $tamano=5; ?>
													@for ($i = 1; $i <= $tamano; $i++)
														@if ($i <= $curso->no_estrellas)
														<img src="{{ URL::asset('img/full.png') }}" alt="UserIcon">
														@else
														<img src="{{ URL::asset('img/empty.png') }}" alt="UserIcon">
														@endif
													@endfor
												</td>
                    <td> {{ $curso->restriccion }} </td>
                </tr>
          </tbody>
        </table>
      </div>
    </div>
    <h1>Descripcion Curso</h1>
    @if($curso->descripcion==null)
    <p>El curso aun no cuenta con una descripcion
    @else
    <p>{{$curso->descripcion}}
    @endif
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