@extends('layouts.layout1')
@section('content')
 <div class="container">
    @if(Session::has('notice'))
       <div class="alert alert-success">
          {{ Session::get('notice') }}
       </div>
    @endif
    <h1> Lista de asignaciones </h1>
    <div class="row">
       <div class="col-lg-12">
          {!! link_to('asignaciones/create', 'Crear', ['class' => 'btn btn-primary']) !!}
       </div>
    </div>
    
    <table class="table">
       <thead>
       <tr>
             <th style="width: 35%"> Título </th>
             <th style="width: 35%"> Estado </th>
             
             <th style="width: 10%"> </th>
             <th style="width: 10%"> </th>
             <th style="width: 10%"> </th>
          </tr>
       </thead>
       <tbody>
       
          @foreach ($cursos as $curso)
             <tr>
             ssa
             </tr>
          @endforeach
       </tbody>
    </table>
    
 </div>
 @endsection