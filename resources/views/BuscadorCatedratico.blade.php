@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>CATEDRATICO</small></h1>
			</div>
            <center><p class="lead">BUSCADOR DE CATEDRATICO</p></center>
		</div>

        <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>

					{!!Form::open(array('url'=>'BuscadorCatedratico','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" name = "searchText" placeholder="Catedratico..." value = "{{$searchText}}">
							</div>
							<button type="submit" class="btn btn-default">BUSCAR</button>
						</form>
					{{Form::close()}}
					</ul>
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">

							</div>
					  	</div>
					</div>
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
						
						
					
					
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
                                    
                                    
									@foreach ($catedraticos as $elemento)
                                            
                                            <td>{{$elemento->registro}}</td>
	  										<td>{{$elemento->nombre_catedratico}}</td>
											<td>{{$elemento->apellido_catedratico}}</td>
                                            <td>{{$elemento->direccion_catedratico}}</td>
											<td>{{$elemento->email_catedratico}}</td>
                                            
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
                    


						  
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection
