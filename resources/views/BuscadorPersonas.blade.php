@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Persona</small></h1>
			</div>
            <center><p class="lead">BUSCADOR DE PERSONAS</p></center>
		</div>
         <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                          <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Persona">
						</div>
						<button type="submit" class="btn btn-default">BUSCAR</button>
						<input type="radio" name="busqueda" id="always" value="1" checked/>
						<label for="always">Correo</label>
						<input type="radio" name="busqueda" id="never" value="2"/>
						<label for="never">Nombre</label>
						</form>
					</ul>
					
                       
					
					
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
							<table class="table table-hover text-center">
									<thead>
										<tr>
											
                                            <th class="text-center">Registro</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Apellido</th>
											<th class="text-center">Direccion</th>
											<th class="text-center">Email</th>
											
										</tr>
									</thead>
									<tbody>
                                    
                                    {{--
										@foreach ($arreglo as $elemento)
                                            
                                            <td>{{$elemento->registro_academico}}</td>
	  										<td>{{$elemento->nombre_catedratico}}</td>
											<td>{{$elemento->apellido_catedratico}}</td>
                                            <td>{{$elemento->direccion_catedratico}}</td>
											<td>{{$elemento->email_catedratico}}</td>
                                            
										</tr>
                                        @endforeach
										--}}
									</tbody>
								</table>
							</div>
					  	</div>
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection