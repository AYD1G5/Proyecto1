@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>CURSOS</small></h1>
			</div>
            <center><p class="lead">REPORTE DE LAS ENCUESTAS SOBRE EL DESEMPEÑO DE LOS CATEDRATICOS</p></center>
		</div>
		<div class="container-fluid">
			<h3>Catedratico:  {{$arreglo3[0]->nombre}}</h3>
			<h3>Curso: {{$arreglo2[0]->nam}}</h3>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>

					</ul>
					<h3>Valoracion total: {{$arreglo1[0]->sumi}}</h3>
					<h3>Valoracion Promedio: {{$arreglo1[0]->prom}}</h3>
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">PREGUNTA</th>
                      <th class="text-center">RESPUESTA</th>

										</tr>
									</thead>
									<tbody>

									@foreach ($arreglo as $elemento)
									 <tr>
									  @if($elemento->preg==1)
									  <td>Puntualidad del catedratico</td>
									  @elseif($elemento->preg==2)
										<td>Preparacion del catedratico</td>
									  @elseif($elemento->preg==3)
										<td>Conocimientos de temas</td>
									  @elseif($elemento->preg==4)
										<td>Calidad de explicacion</td>
								    @elseif($elemento->preg==5)
									  <td>Accesibilidad del catedratico</td>
								    @elseif($elemento->preg==6)
									  <td>Responsabilidad del catedratico</td>
										@endif
									     <td>{{$elemento->res}}</td>
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
