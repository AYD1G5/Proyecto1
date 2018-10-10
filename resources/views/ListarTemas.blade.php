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
                                    <td>{!! link_to('/PerfilTema/'.$usuario->tema, 'Ver Perfil', ['class' => 'btn btn-warning']) !!}</td>
                                </tr>
                                @endforeach
									</tbody>
								</table>
							</div>
					  	</div>
</div>
@endsection 