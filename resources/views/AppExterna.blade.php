@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>APP EXTERNA</small></h1>
			</div>
			<center><p class="lead">Listado de App</p></center>
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
									<tbody>
  										@foreach ($AppExternaVector as $elemento)
										  	<tr>										  	
										  		<td>
													<img src="{{URL::asset($elemento->ruta)}}" alt="profile Pic" height="200" width="200">
												
													<a href="{{url($elemento->linkexterno)}}" target="_blank" class="btn btn-success btn-raised btn-xs" style="height:50px;width: 90%; font-size: 25px;background-color: #212F3D;">{{$elemento->nombre}}</a>
													<a href="{{url($elemento->linkexterno)}}" target="_blank" style="height:50px;width: 90%; font-size: 25px;">{{$elemento->descripcion}}</a>
													<br/><br/><br/>
												</td>
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
					  	    <li class="active"><a href="#list" data-toggle="tab">Aplicaciones Externas</a></li>
                    
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
