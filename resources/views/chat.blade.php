@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <chat-component></chat-component>
        <template>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                    @foreach($usuarios as $user)
                        <div class="users">
                            <a href="#">{{ $user->nombre }}</a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </template>
        <user-component></user-component>
        
    </div>
</div>
@endsection