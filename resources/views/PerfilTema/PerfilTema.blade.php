@extends('layouts.layout1')
@section('content')
	@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
    @endif
<!-- Content page -->
<div class="container-fluid">
		
		<div class="page-header">
			@if(empty($tema))
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>ERROR 404</small></h1>
			<center><p class="lead">ERROR 404</p></center>
			@else
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>{{$tema->nombre_tema}}</small></h1>
			<center><p class="lead">{{$tema->descripcion}}</p></center>
			@endif
		</div>



	<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list1" data-toggle="tab">Comentarios</a></li>
                        <li><a href="#list" data-toggle="tab">Informacion Tema</a></li>
						
					</ul>
					<div id="myTabContent" class="tab-content">

					  	<div class="tab-pane fade " id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
										<th></th>
											<th class="text-center">Codigo</th>
											<th class="text-center">Nombre</th>
										</tr>
									</thead>
									<tbody>
									@if(!empty($tema))
											<tr><td  width="5%"><h3>Autor</h3></td><td><h3>{{ $creador->registro_academico }}</h3></td><td><h3> {{ $creador->nombre }} {{ $creador->apellido }}</h3></td></tr>
											<tr><td width="5%"><h3>Curso</h3></td><td><h3>{{ $curso->codigo_curso }}</h3></td><td><h3> {{ $curso->nombre_curso }}</h3></td></tr>
									@endif
									</tbody>
								</table>

							</div>
					  	</div>
                          <div class="tab-pane fade active in" id="list1">
						  @if(!empty($tema))
						  {{ Form::open(array('url' => 'PerfilTema/'.$tema->tema,'autocomplete'=>'off')) }}
													<div class="form-group label-floating">
															<label class="control-label">Comentar</label>
															<input name="texto" class="form-control" type="text"></div>
												<div align="right">	<button type="submit" href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Save</button></div>
							{{ Form::close() }}
							@endif
							<div class="table-responsive">
							
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Usuario</th>
											<th class="text-center">Comentario</th>
										</tr>
									</thead>
									<tbody>
									@if(!empty($comentarios))
										@foreach ($comentarios as $comentario)
										<tr>
											<td>{{$comentario->autor->registro_academico}}</td>
											<td>{{$comentario->comentario->comentario}}</td>
											</tr>										
											@endforeach
										@endif
									<tr><td width="5%"></td><td></td></tr>
									</tbody>
								</table>

							</div>
							
					  		</div>
                         
					</div>
				</div>
			</div>
		</div>
@endsection
