@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Carreras</small></h1>
			</div>
			<center><p class="lead">Catalogo Carrera</p></center>
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
								<div style="padding: 0% 35% 35% 35%;">
									<table class="table table-hover text-center">
									<div  class="side">
									
									</table>
								</div>
					  	</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
							</div>
					  	</div>
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	    <li class="active"><a href="#list" data-toggle="tab">Catalogo Carrera</a></li>

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
