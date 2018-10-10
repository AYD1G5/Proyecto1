@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Grupos</small></h1>
			</div>
            <center><p class="lead">BUSCADOR DE GRUPOS</p></center>
    </div>
         <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                          <form class="navbar-form navbar-left"  method="post">
						  @csrf
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Grupo" name="grupo">
                            </div>
                            <input type="submit" class="btn btn-default" value="BUSCAR" name="opcion"></input>
						</form> 
					</ul>					
				</div>
				<table class="table table-hover text-center">
						<thead>
						<tr>
							<th>
								Nombre										  	
					  		</th>
							<th>
								Agregar										  	
					  		</th>
						</tr>
						</thead>
									<tbody>
  										@foreach ($grupos as $elemento)
										  	<tr>										  	
										  		<td>	
												  {{ $elemento->nombre }}	
												  <input type="submit" class="btn btn-default" value="{{ $elemento->nombre}}" name="opcion"></input>
												  
												</td>
											</tr>
											
										@endforeach	
									</tbody>
								</table>

			</div>
		</div>
@endsection