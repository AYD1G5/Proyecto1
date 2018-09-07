@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>CATEDRATICO</small></h1>
			</div>
            <center><p class="lead">INFORMACIÓN DE CATEDRATICO</p></center>
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
							<table class="table table-hover">
						
                                    @foreach ($datosCatedratico as $elemento)
									<tr><td><h2>Id</h2></td><td><h2> {{$elemento->id_catedratico}}</h2></td></tr>
									<tr><td><h2>Registro:</h2></td><td><h2> {{$elemento->registro_catedratico}}</h2></td></tr>
									<tr><td><h2>Nombre:</h2></td><td><h2> {{$elemento->nombre_catedratico}}</h2></td></tr>
									<tr><td><h2>Apellido:</h2></td><td><h2> {{$elemento->apellido_catedratico}}</h2></td></tr>
									<tr><td><h2>Direccion:</h2></td><td><h2> {{$elemento->direccion_catedratico}}</h2></td></tr>
									<tr><td><h2>Email:</h2></td><td><h2> {{$elemento->email_catedratico}}</h2></td></tr>
									@endforeach
							</table>
							</div>
					  	</div>
					</div>
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                       
					</ul>
					<center><p class="lead">CURSOS IMPRATIDOS POR CATEDRATICO</p></center>
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
										</tr>
								</thead>
								<tbody>
										@foreach ($cursosPorCatedratico as $elemento)
                                            <td>{{$elemento->codigo_curso}}</td>
                                            <td>{{$elemento->creditos_curso}}</td>
	  										<td>{{$elemento->nombre_curso}}</td>                                   
										</tr>
                                        @endforeach
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
