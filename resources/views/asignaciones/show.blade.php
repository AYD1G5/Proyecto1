@extends('layouts.app')
@section('content')
 <div class="container">
    <h1> {{ $asignacion->id }} ({{ $asignacion->ciclo->nombre_ciclo }}) </h1>
    <div class="row">
       <div class="col-lg-12">
          <!--{{ $tarea->descripcion }}-->
       </div>
       <hr />
       <div class="col-lg-12">
          {!! link_to('asignaciontemporal', 'Volver', ['class' => 'btn btn-danger']) !!}
       </div>
    </div>
 </div>
@endsection