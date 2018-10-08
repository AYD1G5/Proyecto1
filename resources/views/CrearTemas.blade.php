@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>TEMAS</small></h1>
			</div>
            <center><p class="lead">CREAR TEMAS</p></center>
		</div>
        
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab"></a></li>
                        <form class="navbar-form navbar-left"  method="post">
                        </ul>
					   

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                            <label class="col-form-label" for="inputDefault">TITULO DEL TEMA:</label>
                            <input name="titulo" type="text" class="form-control" placeholder="Nombre" id="inputDefault">
                            </div>

                            <div class="form-group">
                            <label class="col-form-label" for="inputDefault">DESCRIPCIÓN DEL TEMA: </label>
                            <input name="desc" type="text" class="form-control" placeholder="Descripción" id="inputDefault">
                            </div>

                            
                            <div class="form-group">
                            <label class="col-form-label" for="inputDefault">GRUPO: </label>
                            <input name="desc" type="text" class="form-control" placeholder="Descripción" id="inputDefault">
                            </div>

                            
                            <div class="button"> </div>  
                            <button type="submit">Guardar</button>
                            </form>
						
					
                       
					
					

					  	</div>
					</div>
				</div>
			</div>
		</div>
@endsection