@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>APP EXTERNA</small></h1>
			</div>
			<center><p class="lead">Listado de App</p></center>
		</div>

        <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div id="myTabContent" class="tab-content">
					</div>
				</div>
			</div>
			<ul class="full-box list-unstyled text-center">
                <li class="nav-item">Video Conferencias</li>	
				<li class="nav-item">Calendario</li>	
				<li class="nav-item">Chat de Messenger</li>	
			<ol>
		</div>
@endsection
