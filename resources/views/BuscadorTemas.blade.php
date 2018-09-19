@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Temas</small></h1>
			</div>
            <center><p class="lead">BUSCADOR DE TEMAS</p></center>
    </div>
         <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tema">
                            </div>
                            <button type="submit" class="btn btn-default">BUSCAR</button>
						</form> 
					</ul>					
				</div>
                <table class="table table-hover text-center">
									<thead>
										<tr>
											
                                            <th class="text-center">Tema</th>
											<th class="text-center">Nombre Tema</th>
											<th class="text-center">Descripcion</th>
											<th class="text-center">Creador</th>
											<th class="text-center">Curso</th>
											
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
@endsection