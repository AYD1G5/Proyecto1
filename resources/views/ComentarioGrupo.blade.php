@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>COMENTARIO GRUPO</small></h1>
			</div>
			<center><p class="lead">Grupo: {{$GrupoName}}</p></center>
			<center><p class="lead">Tema: {{$TemaName}}</p></center>
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
								@if(count($ComentariosVector)>0)
								<table class="table table-hover text-center">
									<tbody>
										@foreach ($ComentariosVector as $elemento)	
										<tr>
										<div style="border-radius: 15px 15px 15px 15px; -moz-border-radius: 15px 15px 15px 15px;-webkit-border-radius: 15px 15px 15px 15px;border: 2px solid #5878ca;margin: 0 0 25px;background: #EAF2F8;padding: 20px 20px 20px 20px;">
										<p style="font-weight: bold;">{{$elemento->nombre}}:</p>
										<p>{{$elemento->Texto}}</p>										
										</div>
										</tr>
										@endforeach
									</tbody>
								</table>
								@else
									<center><h1>{{$NoTemas}}</h1></center>
								@endif

									<form  method="post">
										@csrf
										<center>
										<br><strong>Comentar:<strong><br>
										<input type="text" name="texto" id="textoID" width="300px"/>
										<div class="button">
										<button type="submit">Crear</button></div>
										</center>
									</form>

									<br>
									<br>

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
