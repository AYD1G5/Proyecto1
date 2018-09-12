@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>CATEDRATICO</small></h1>
			</div>
            <center><p class="lead">BUSCADOR DE CATEDRATICO</p></center>
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

							</div>
					  	</div>
					</div>
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                       
					
					
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								
							</div>
					  	</div>
                    


						  
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection
