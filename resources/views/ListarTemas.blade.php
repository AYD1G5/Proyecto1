@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>LISTAR TEMAS</small></h1>
    </div>
    <center><p class="lead">LISTAR TEMAS</p></center>
                    <div class="tab-pane fade active in" id="list">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">creador</th>
                                        <th class="text-center">Curso</th>
                                        <th class="text-center">Ver Perfil</th>
                                        <th class="text-center">Acciones</th>
									</tr>
									</thead>
								<tbody>
                                @foreach($temas as $usuario)
                                <tr class="table-info">
                                    <td>{{ $usuario->tema }}</td>
                                    <td>{{ $usuario->nombre_tema }}</td>
                                    <td>{{ $usuario->descripcion }}</td>
                                    <td>{{ $usuario->nombre_user }}</td>
                                    <td>{{ $usuario->nombre_curso }}</td>
                                    <td> 
                                    @if($usuario->reportado==0)
                                        {!! link_to('/PerfilTema/'.$usuario->tema, 'Ver Perfil', ['class' => 'btn btn-success btn-raised']) !!}
                                     @endif
                                    </td>
                                    @if($usuario->reportado==0)
                                        <td> {!! link_to('/ReportarTema/'.$usuario->tema, 'Reportar', ['class' => 'btn btn-success btn-raised']) !!}</td>
                                    @else
                                    <td> {!! link_to('/QuitarReporteTema/'.$usuario->tema, 'Quitar Reportar', ['class' => 'btn btn-danger btn-raised']) !!}</td>
                                    @endif
                                </tr>
                                @endforeach
									</tbody>
								</table>
							</div>
					  	</div>
</div>
@endsection 