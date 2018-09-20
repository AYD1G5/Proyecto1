@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>USUARIOS</small></h1>
			</div>
			<div class="alert alert-dismissible alert-info">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>SALUDE A SUS AMIGOS!!!</strong> Se muestran todo sus amigos <a href="#" class="alert-link">a los cuales les podra enviar un saludo </a>, simplemente presionando el boton de saludar.
			</div>
			<div class="progress">
			  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
            <center><p class="lead">LISTADO DE USUARIOS OFICIALES</p></center>
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
											<th class="text-center">Registro Academico</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Apellido</th>
                      <th class="text-center">Direccion</th>
                      <th class="text-center">Email</th>
										</tr>
									</thead>
									<tbody>
										@foreach($Usuarios as $usuario)
							        <tr class="table-info">
							          <td>{{ $usuario->registro_academico }}</td>
							          <td>{{ $usuario->nombre }}</td>
							          <td>{{ $usuario->apellido }}</td>
							          <td>{{ $usuario->direccion }}</td>
							          <td>{{ $usuario->email }}</td>
												<td>{!! link_to('/ListarUsuarios', 'SALUDAR', ['class' => 'btn btn-warning']) !!}</td>
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
