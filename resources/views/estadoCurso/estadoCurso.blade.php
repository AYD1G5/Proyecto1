@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> {{$semestre}} <small>SEMESTRE</small></h1>
			</div>
            <center><p class="lead">36 Creditos, 8 Obligatorios, 3 Opcionales</p></center>
            <div style="float:left">
            @if($semestreAnterior==0)
            <a href="#!" disabled ="" class="btn btn-success btn-raised btn"><i class="zmdi zmdi-long-arrow-left"></i></a>
            @else
            <a href="{{url('/cursosporsemestre/'.$semestreAnterior.'/semestre')}}" class="btn btn-success btn-raised btn"><i class="zmdi zmdi-long-arrow-left"></i></a>
            @endif
            </div>
            <div style="float:right">
            @if($semestreSiguiente==11)
            <a href="#!" disabled ="" class="btn btn-success btn-raised btn"><i class="zmdi zmdi-long-arrow-right"></i></a>
            @else
            <a href="{{url('/cursosporsemestre/'.$semestreSiguiente.'/semestre')}}" class="btn btn-success btn-raised btn"><i class="zmdi zmdi-long-arrow-right"></i></a>
            @endif
            </div>

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
