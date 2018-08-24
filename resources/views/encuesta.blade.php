@extends('layouts.layout1')
@section('content')
<style>
    <style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial;
    margin: 0 auto; /* Center website */
    padding: 20px;
}
    .side {
  margin-left:2em;
    float: left;
    width: 55%;
    margin-top:10px;
}
    </style>
<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> <small>Encuesta</small></h1>
			</div>
            <center><p class="lead">Encuesta de desempeño</p></center>
		</div>

        <?php $variable = 0; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div id="myTabContent" class="tab-content">
					  	
                          
					</div>
				</div>
			</div>
        </div>
        <div  class="side">
        <form  method="post">
            @csrf
            <P>El catedratico es puntual?<br>
            <input type="radio" name="puntual" id="always" value="1" checked/>
            <label for="always">1</label>

            <input type="radio" name="puntual" id="never" value="2"/>
            <label for="never">2</label>

            <input type="radio" name="puntual" id="change" value="3"/>
            <label for="change">3</label>

            <input type="radio" name="puntual" id="change" value="4"/>
            <label for="change">4</label>

            <input type="radio" name="puntual" id="change" value="5"/>
            <label for="change">5</label>

            <P>El catedratico se prepara?<br>
            <input type="radio" name="preparacion" id="always" value="1" checked/>
            <label for="always">1</label>

            <input type="radio" name="preparacion" id="never" value="2"/>
            <label for="never">2</label>

            <input type="radio" name="preparacion" id="change" value="3"/>
            <label for="change">3</label>

            <input type="radio" name="preparacion" id="change" value="4"/>
            <label for="change">4</label>

            <input type="radio" name="preparacion" id="change" value="5"/>
            <label for="change">5</label>
            
            <P>El catedratico maneja el tema?<br>
            <input type="radio" name="manejo" id="always" value="1" checked/>
            <label for="always">1</label>

            <input type="radio" name="manejo" id="never" value="2"/>
            <label for="never">2</label>

            <input type="radio" name="manejo" id="change" value="3"/>
            <label for="change">3</label>

            <input type="radio" name="manejo" id="change" value="4"/>
            <label for="change">4</label>

            <input type="radio" name="manejo" id="change" value="5"/>
            <label for="change">5</label>

            <P>El catedratico se explica bien?<br>
            <input type="radio" name="entendible" id="always" value="1" checked/>
            <label for="always">1</label>

            <input type="radio" name="entendible" id="never" value="2"/>
            <label for="never">2</label>

            <input type="radio" name="entendible" id="change" value="3"/>
            <label for="change">3</label>

            <input type="radio" name="entendible" id="change" value="4"/>
            <label for="change">4</label>

            <input type="radio" name="entendible" id="change" value="5"/>
            <label for="change">5</label>

            <P>El catedratico es accesible?<br>
            <input type="radio" name="accesible" id="always" value="1" checked/>
            <label for="always">1</label>

            <input type="radio" name="accesible" id="never" value="2"/>
            <label for="never">2</label>

            <input type="radio" name="accesible" id="change" value="3"/>
            <label for="change">3</label>

            <input type="radio" name="accesible" id="change" value="4"/>
            <label for="change">4</label>

            <input type="radio" name="accesible" id="change" value="5"/>
            <label for="change">5</label>

            <P>El catedratico es responsable?<br>
            <input type="radio" name="responsable" id="always" value="1" checked/>
            <label for="always">1</label>

            <input type="radio" name="responsable" id="never" value="2"/>
            <label for="never">2</label>

            <input type="radio" name="responsable" id="change" value="3"/>
            <label for="change">3</label>

            <input type="radio" name="responsable" id="change" value="4"/>
            <label for="change">4</label>

            <input type="radio" name="responsable" id="change" value="5"/>
            <label for="change">5</label>

            <div class="button"> </div>  
            <button type="submit">Send your message</button>

        </form>      
</div>
@endsection