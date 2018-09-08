@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>TEMA GRUPO</small></h1>
			</div>
			<center><p class="lead">Grupo: {{$GrupoName}}</p></center>
			<center><p class="lead">Listado de Temas que pertenecen al Grupo</p></center>
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
								<div style="padding: 0% 20% 20% 20%;">
								@if(count($TemasVector)>0)
								<table class="table table-hover text-center">
									<tbody>
										@foreach ($TemasVector as $elemento)	
										<tr>
											<td><a href="{{url('/ComentarioGrupo/'.$elemento->id_Tema_Grupo.'')}}" class="btn btn-success btn-raised btn-xs" style="height:50px;width: 90%; font-size: 25px;background-color: #212F3D;">{{$elemento->Titulo}}</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								@else
									<center><h1>{{$NoTemas}}</h1></center>
								@endif
								</div>
					  	</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
							</div>
					  	</div>
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	    <li class="active"><a href="#list" data-toggle="tab">Perfil Grupo</a></li>
                    
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
