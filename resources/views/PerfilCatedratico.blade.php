@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>SEMESTRE</small></h1>
			</div>
            <center><p class="lead">PERFIL DE CATEDRATICO</p></center>
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
											<th class="text-center">Codigo</th>
                                            <th class="text-center">Creditos</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Estado</th>
											<th class="text-center">Nota</th>
											
										</tr>
									</thead>
									<tbody>
                                    
                                    @foreach ($arreglo as $elemento)
                                            <td>{{$elemento->id}}</td>
                                            <td>{{$elemento->registro_academico}}</td>
	  										<td>{{$elemento->nombre_catedratico}}</td>
											<td>{{$elemento->apellido_catedratico}}</td>
                                            <td>{{$elemento->direccion_catedratico}}</td>
                                            
                                            
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
