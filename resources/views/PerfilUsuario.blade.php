@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>USUARIO</small></h1>
			</div>
            <center><p class="lead">INFORMACIÓN DE USUARIO</p></center>
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
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection
