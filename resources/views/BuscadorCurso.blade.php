@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>CURSO</small></h1>
			</div>
            <center><p class="lead">BUSCADOR DE CURSO</p></center>
		</div>

        <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				
				<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                       
					</ul>
					{!!Form::open(array('url'=>'BuscadorCurso','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" name = "searchText" placeholder="Curso..." value = "{{$searchText}}">
							</div>
							<button type="submit" class="btn btn-default">BUSCAR</button>
						</form>
					{{Form::close()}}
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                       
					</ul>
						<div class="table-responsive">
							<table class="table table-hover text-center">
								<thead>
									<tr>
										
										<th class="text-center">Id</th>
										<th class="text-center">Codigo</th>
										<th class="text-center">Nombre</th>
										<th class="text-center">Escuela</th>
										<th class="text-center">Area</th>
										
									</tr>
								</thead>
								<tbody>
								
								
								@foreach ($cursos as $elemento)
										
										<td>{{$elemento->id}}</td>
										<td>{{$elemento->codigo_curso}}</td>
										<td>{{$elemento->nombre_curso}}</td>
										<td>{{$elemento->escuela}}</td>
										<td>{{$elemento->area}}</td>
										
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
@endsection