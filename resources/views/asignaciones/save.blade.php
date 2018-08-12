@extends('layouts.app')
@section('content')
 <div class="container">
    <h1> Guardar Asignacion </h1>
    {!! Form::open(array('url' => 'asignaciones/' . $asignacion->id, 'method' => $method)) !!}
      <!-- <div class="form-group">
          {!! Form::label('titulo', 'Título') !!}
          {!! Form::text('titulo', $asignacion->titulo, ['class' => 'form-control']) !!}
       </div>
       <div class="form-group">
          {!! Form::label('descripcion', 'Descripción') !!}
          {!! Form::textarea('descripcion', $tarea->descripcion, ['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
       </div> -->
       <div class="form-group">
          {!! Form::label('ciclo', 'Ciclo') !!}
          <select name="ciclo_id" id="ciclo_id" class="form-control"> 
             <option value=""> --- </option>
             @foreach ($ciclos as $item)
                @if($asignacion->id != null && $item->id == $asignacion->ciclo_id->id)
                   <option selected="selected" value="{{ $item->id }}"> {{ $item->nombre_ciclo }} </option>
                @else
                   <option value="{{ $item->id }}"> {{ $item->nombre_ciclo }} </option>
                @endif
             @endforeach
          </select>
       </div>
       {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} 
       {!! link_to('asignaciones', 'Cancelar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
 </div>
@endsection