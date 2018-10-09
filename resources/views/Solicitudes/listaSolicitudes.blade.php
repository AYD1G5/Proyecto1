@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Solicitudes de Amistad</small></h1>
			</div>
			<div class="alert alert-dismissible alert-info">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Acepte Solicitudes!!!</strong> Solamente de personas conocidas , de no conocerlas rechazelas.
			</div>
			<div class="progress">
			  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
            <center><p class="lead">LISTADO DE SOLICITUDES DE AMISTAD RECIBIDAS</p></center>
		</div>
		<div class="container-fluid">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>

					</ul>
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead class="table-primary">
										<tr>
											<th class="text-center">NOMBRE USUARIO</th>
                                            <th class="text-center">ESTADO</th>
                                            <th class="text-center">ACCIONES</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($solicitudes as $usuario)
							        <tr class="table-info">
							          <td>{{ $usuario->amigo->nombre }}</td>
                                      @if($usuario->solicitud->no_estado==0)
                                      <td>EN ESPERA</td>
                                      @endif
                                      @if($usuario->solicitud->no_estado==1)
                                      <td>ACEPTADO</td>
                                      @endif
                                      @if($usuario->solicitud->no_estado==2)
                                      <td>RECHAZADO</td>
                                      @endif
                                      <td>{!! link_to('/solicitudes/cambiarestado/'.$usuario->solicitud->solicitud_id.'/1', 'ACEPTAR', ['class' => 'btn btn-success btn-raised btn']) !!}
                                      {!! link_to('/solicitudes/cambiarestado/'.$usuario->solicitud->solicitud_id.'/2', 'RECHAZAR', ['class' => 'btn btn-danger btn-raised btn']) !!}
                                      {!! link_to('/solicitudes/cambiarestado/'.$usuario->solicitud->solicitud_id.'/0', 'INGORAR', ['class' => 'btn btn-warning btn-raised btn']) !!}</td>
							        </tr>
							      @endforeach
									</tbody>
								</table>
							</div>
					  	</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
							</div>
					  	</div>

                          <div class="tab-pane fade" id="list2">
							<div class="table-responsive">
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection