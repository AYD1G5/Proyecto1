@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Pensum</small></h1>
			</div>
			<center><p class="lead">SOLICITUDES</p></center>
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
							<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Codigo_Pensum</th>
                                            <th class="text-center">Nombre_Pensum</th>
											<th class="text-center">Id_Carrera</th>
											
										</tr>
									</thead>
									<tbody>
                                    
                                    
										@foreach ($Solicitudes as $elemento)
                                            <td>{{$elemento->codigo_pensum}}</td>
                                            <td>{{$elemento->nombre_pensum}}</td>
	  										<td>{{$elemento->id_carrera}}</td>
                                            
										</tr>
                                        @endforeach

                                    
									</tbody>
								</table>

							</div>
							<br>
								<div style="padding: 0% 35% 0% 35%;">
					  			</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
							</div>
	                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	    <li class="active"><a href="#list" data-toggle="tab">Catalogo Carrera</a></li>
					    	</ul>
						   </div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection
