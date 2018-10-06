@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Grupo</small></h1>
			</div>
			<center><p class="lead">Crear Nuevo Grupo</p></center>
			<center> <ul class="nav nav-tabs" style="margin-bottom: 15px;width: 70%;">
					  	    <li class="active"><a href="#list" data-toggle="tab"></a></li>
					    </ul></center>
		</div>



        <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
							</div>
							<br>
								<div style="padding: 0% 35% 35% 35%;">
									<table class="table table-hover text-center">
										<thead>
											<tr>
												<th class="text-center">Codigo Grupo</th>
	                      <th class="text-center">Cantidad Estudiantes</th>
												<th class="text-center">Nombre Grupo</th>
												<th class="text-center">Estado Grupo</th>
											</tr>
										</thead>
										<tbody>
											<tr>
	                      <td>1</td>
	                      <td>0</td>
		  									<td>Grupo Prueba 1</td>
												<td>INACTIVO</td>
	                    </tr>
												<tr>
		                      <td>2</td>
		                      <td>0</td>
			  									<td>Grupo Prueba 2</td>
													<td>ACTIVO</td>
		                    </tr>
													<tr>
			                      <td>3</td>
			                      <td>0</td>
				  									<td>Grupo Prueba 3</td>
														<td>INACTIVO</td>
			                    </tr>
														<tr>
				                      <td>4</td>
				                      <td>0</td>
					  									<td>Grupo Prueba 4</td>
															<td>ACTIVO</td>
				                    </tr>
															<tr>
					                      <td>5</td>
					                      <td>0</td>
						  									<td>Grupo Prueba 5</td>
																<td>INACTIVO</td>
					                    </tr>
																<tr>
						                      <td>6</td>
						                      <td>0</td>
							  									<td>Grupo Prueba 6</td>
																	<td>ACTIVO</td>
						                    </tr>
																	<tr>
							                      <td>7</td>
							                      <td>0</td>
								  									<td>Grupo Prueba 7</td>
																		<td>INACTIVO</td>
							                    </tr>
																		<tr>
								                      <td>8</td>
								                      <td>0</td>
									  									<td>Grupo Prueba 8</td>
																			<td>ACTIVO</td>
								                    </tr>
																			<tr>
									                      <td>9</td>
									                      <td>0</td>
										  									<td>Grupo Prueba 9</td>
																				<td>INACTIVO</td>
									                    </tr>
																				<tr>
										                      <td>10</td>
										                      <td>0</td>
											  									<td>Grupo Prueba 10</td>
																					<td>ACTIVO</td>
										                    </tr>
										</tbody>
									</table>
								</div>
					  	</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
							</div>
					  	</div>
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	    <li class="active"><a href="#list" data-toggle="tab">Nuevo Grupo</a></li>

					    </ul>

                          <div class="tab-pane fade" id="list2">
							<div class="table-responsive">
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection
