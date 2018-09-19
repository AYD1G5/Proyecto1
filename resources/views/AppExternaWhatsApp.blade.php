@extends('layouts.layout1')
@section('content')
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>APP EXTERNA</small></h1>
			</div>
			<center>
			<table style="width:70%;">
				<tr style="width:100%;">
					<td style="width:30%; ">
						<img src="/img/AppExt_WhatsApp.png" alt="profile Pic" height="100" width="100">
					</td>
					<td style="width:35%; text-align: center;">
						<h1 class="lead"><strong>WHATSSAPP<strong></h1>
					</td>
					<td style="width:30%; float: right;">
						<img src="/img/AppExt_WhatsApp.png" alt="profile Pic" height="100" width="100">
					</td>
				</tr>
			</table>
			</center>	
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


							<form  method="post">
								@csrf
								<table class="table table-hover text-center">
									<tbody>
									<center><strong>Selecciona un Amigo con numero WhatsApp:</strong></center><br/>
									<center><select name="Amigo">
										@foreach ($usuariosVector as $elemento)
										   <option value={{$elemento->telefono}}>{{$elemento->nombre}} {{$elemento->apellido}}</option> 
										   @endforeach	
									</select></center>
									<br/><br/>
									<center><strong>Escribe un Mensaje:<strong></center>
									<br/>
									<center><input type="text" name="texto" id="textoID" width="300px"/></center>
									<br/><br/>
									<div class="button"> 
						            <center><button type="submit">Send your message</button></center>
									</div>  
									</tbody>
								</table>
							</form>      
								</div>
					  	</div>
                          <div class="tab-pane fade" id="list1">
							<div class="table-responsive">
							</div>
					  	</div>
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	    <li class="active"><a href="#list" data-toggle="tab">Aplicaciones Externas</a></li>
                    
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
