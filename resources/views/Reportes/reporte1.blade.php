@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>SEMESTRE</small></h1>
			</div>
            <center><p class="lead">Reporte Cursos Ganados</p></center>
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
                                            <td>{{$elemento->codigo_curso}}</td>
                                            <td>{{$elemento->creditos}}</td>
	  										<td>{{$elemento->nombre_curso}}</td>
											<td>{{$elemento->estado}}</td>
                                            <td>{{$elemento->nota}}</td>
                                            <?php $variable = $variable + $elemento->creditos; ?>
                                            
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
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	    <li class="active"><a href="#list" data-toggle="tab">Cursos Ganados: {{@count($arreglo)}}</a></li>
                              <li class="active"><a href="#list" data-toggle="tab">Creditos: {{$variable}}</a></li>
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
