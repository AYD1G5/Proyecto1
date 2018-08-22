@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">

				<ul  class="nav nav-tabs" style="margin-bottom: 15px;">
						@foreach($Estados as $temp)
						@if($temp->color=="VERDE")
						<li><a href="{{url('/cursosporsemestre/'.$temp->numero.'/semestre')}}"><button  class=" btn-success btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>{{$temp->nombreSemetre}}</button></a></li>
						@endif
						@if($temp->color=="AMARILLO")
						<li><a href="{{url('/cursosporsemestre/'.$temp->numero.'/semestre')}}"><button class="btn-warning btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>{{$temp->nombreSemetre}}</button></a></li>
						@endif
						@if($temp->color=="ROJO")
						<li><a href="{{url('/cursosporsemestre/'.$temp->numero.'/semestre')}}"><button class="btn-danger btn-raised btn-sm"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i>{{$temp->nombreSemetre}}</button></a></li>
						@endif
						@endforeach
						</ul>
			</div>
            <center><p class="lead">{{$semestre}} SEMESTRE</p></center>

		</div>


		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab">Todos</a></li>
                        <li><a href="#list1" data-toggle="tab">Aprobados</a></li>
                        <li><a href="#list2" data-toggle="tab">No Aprobados</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">

					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Codigo</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Estado</th>
											<th class="text-center">Ver informacion</th>
											<th class="text-center">Accion</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($elementos as $elemento)
                                        @if($elemento->estado=="GANADO")
                                        <tr bgcolor="#46B652">
                                        @elseif($elemento->estado=="DESBLOQUEADO")
                                        <tr bgcolor="#7CD1FB">
                                        @elseif($elemento->estado=="ASIGNADO")
                                        <tr bgcolor="#FFC300">
                                        @else
                                        <tr bgcolor="#FE913C">
                                        @endif
                                            <td>{{$elemento->codigo_curso}}</td>
	  										<td>{{$elemento->nombre_curso}}</td>
											<td>{{$elemento->estado}}</td>
											<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/mostrar')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											@if($elemento->estado=="GANADO")
											<td></td>
											@elseif($elemento->estado=="DESBLOQUEADO")
											<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/create')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Asignar</a></td>
											@elseif($elemento->estado=="ASIGNADO")
											<td><a href="{{url('/asignaciontemporal')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Desasignar</a></td>
											@else
											<td></td>
											@endif
										</tr>

                                        @endforeach
									</tbody>
								</table>

							</div>
					  	</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Codigo</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Estado</th>
											<th class="text-center">Ver informacion</th>
											<th class="text-center">Accion</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($elementos as $elemento)
                                        @if($elemento->estado=="GANADO")
                                        <tr bgcolor="#46B652">
										<td>{{$elemento->codigo_curso}}</td>
	  										<td>{{$elemento->nombre_curso}}</td>
											<td>{{$elemento->estado}}</td>
											<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/mostrar')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
											@if($elemento->estado=="GANADO")
											<td></td>
											@elseif($elemento->estado=="DESBLOQUEADO")
											<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/create')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Asignar</a></td>
											@elseif($elemento->estado=="ASIGNADO")
											<td><a href="{{url('/asignaciontemporal')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Desasignar</a></td>
											@else
											<td></td>
											@endif
										</tr>
                                        @endif

                                    @endforeach

									</tbody>
								</table>

							</div>
					  	</div>
                          <div class="tab-pane fade" id="list2">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">Codigo</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Estado</th>
											<th class="text-center">Ver informacion</th>
											<th class="text-center">Accion</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($elementos as $elemento)
																					@if($elemento->estado=="BLOQUEADO")
																					<tr bgcolor="#FE913C">
											<td>{{$elemento->codigo_curso}}</td>
													<td>{{$elemento->nombre_curso}}</td>
												<td>{{$elemento->estado}}</td>
												<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/mostrar')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
												@if($elemento->estado=="GANADO")
												<td></td>
												@elseif($elemento->estado=="DESBLOQUEADO")
												<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/create')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Asignar</a></td>
												@elseif($elemento->estado=="ASIGNADO")
												<td><a href="{{url('/asignaciontemporal')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Desasignar</a></td>
												@else
												<td></td>
												@endif
											</tr>
																					@endif

																					@if($elemento->estado=="DESBLOQUEADO")
																					<tr bgcolor="#7CD1FB">
											<td>{{$elemento->codigo_curso}}</td>
													<td>{{$elemento->nombre_curso}}</td>
												<td>{{$elemento->estado}}</td>
												<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/mostrar')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a></td>
												@if($elemento->estado=="GANADO")
												<td></td>
												@elseif($elemento->estado=="DESBLOQUEADO")
												<td><a href="{{url('/asignaciontemporal/'.$elemento->codigo_curso.'/create')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Asignar</a></td>
												@elseif($elemento->estado=="ASIGNADO")
												<td><a href="{{url('/asignaciontemporal')}}" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh">Desasignar</a></td>
												@else
												<td></td>
												@endif
											</tr>
																					@endif

																			@endforeach
									</tbody>
								</table>

							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection
