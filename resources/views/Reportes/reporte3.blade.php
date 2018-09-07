@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>CURSOS</small></h1>
			</div>
            <center><p class="lead">REPORTE DE LAS ENCUESTAS SOBRE EL DESEMPEÑO DE LOS CATEDRATICOS</p></center>
		</div>

        <?php $variable = 0; ?>
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
									<thead>
										<tr>
											<th class="text-center">ID</th>
                      <th class="text-center">PROMEDIO</th>
											<th class="text-center">NOMBRE</th>
											<th class="text-center">APELLIDO</th>

										</tr>
									</thead>
									<tbody>
                    <tr>
                        <td>1</td>
                        <td>61</td>
                        <td>ESTUDIANTES1</td>
                        <td>ESTUDIANTES1</td>
                    </tr>
										<tr>
                        <td>1</td>
                        <td>61</td>
                        <td>ESTUDIANTES1</td>
                        <td>ESTUDIANTES1</td>
                    </tr>
										<tr>
												<td>1</td>
												<td>61</td>
												<td>ESTUDIANTES1</td>
												<td>ESTUDIANTES1</td>
										</tr>
										<tr>
												<td>1</td>
												<td>61</td>
												<td>ESTUDIANTES1</td>
												<td>ESTUDIANTES1</td>
										</tr>
										<tr>
												<td>1</td>
												<td>61</td>
												<td>ESTUDIANTES1</td>
												<td>ESTUDIANTES1</td>
										</tr>

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
