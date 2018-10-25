@extends('layouts.layout1')
@section('content')
    <div class="container">
            <center>	
                <div class="p-3 mb-2 bg-primary text-white">
                    <h1 style="margin-bottom: 15px;">Material para:  {{ $nombre_curso }} </h1>
                </div>
			</center>
        
    <div class="col-xs-12">
            <center>
                <div class="p-3 mb-2 bg-info text-white">
                        <h3>Subir nuevo material</h3>
                        
                </div>
            </center>
        <div class="row" style="margin-bottom: 15px;">
            <?php
                echo Form::open(array('url' => 'curso/material/subirmaterialdeapoyo/'.$id_curso_pensum.'/','files'=>'true'));
                echo '<h4>Seleccionar el archivo para subir.</h4>';
                echo '<div class="col-xs-5">';
                echo Form::file('archivo');
                echo '</div>';
                echo '<div class="col-xs-7">';
                echo Form::submit('Subir archivo');
                echo '</div>';
                echo Form::close();
            ?>
        </div>
            <center>
                <div class="p-3 mb-2 bg-info text-white">
                        <h3>Lista de material</h3>
                </div>
            </center>
        <div class="table-responsive">
            <table class="table table-hover table-striped text-center">
            <thead>
                <tr bgcolor="#FFC300">
                    <th style="width: 5%"> ID </th>
                    <th style="width: 30%"> Nombre de archivo </th>
                    <th style="width: 15%"> Tamano de archivo </th>
                    <th style="width: 30%"> Descripcion </th>
                    <th style="width: 20%"> Descargar </th>
                    <th style="width: 20%"> Acciones </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materialporcurso as $material)
                <tr bgcolor="#E5E5E5">
                    <td> {{ $material->id_material }} </td>
                    <td> {{ $material->nombre_archivo }} </td>
                    <td> {{ $material->tamano_archivo }} Bytes </td>
                    <td> {{ $material->descripcion_archivo }} </td>
                    <td> 
                    @if($material->reportado==0)
                    <a href="/curso/material/descargarmaterialdeapoyo/{{ $material->id_material }}/" class="btn btn-warning btn-raised btn"><i class="icon-download-alt"> </i> Descargar archivo</a>                
                   @endif
                    </td>
                    @if($material->reportado==0)
                        <td>{!! link_to('/curso/material/reportarmaterialdeapoyo/'.$material->id_material_curso, 'Reportar', ['class' => 'btn btn-success btn-raised']) !!}</td>
                     @else
                     <td>{!! link_to('/curso/material/quitarreportematerialdeapoyo/'.$material->id_material_curso, 'Quitar Reporte', ['class' => 'btn btn-danger btn-raised']) !!}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

   </div>
@endsection