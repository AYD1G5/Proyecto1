@extends('layouts.layout1')
@section('content')
<font size=6>
<ul class="list-unstyled full-box">
    <li>
        <a href="{{url('/BuscadorPersonas')}}"> Buscador Personas</a><br>
    </li>
    <li>
    <a href="{{url('/BuscadorCatedraticos')}}"> Buscador Catedraticos</a><br>
    </li>
</ul>
</font>
@endsection