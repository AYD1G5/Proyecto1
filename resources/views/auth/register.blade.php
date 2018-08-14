@extends('layouts.layout1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-titles">{{ __('Registrarse') }}</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="registro_academico" class="col-md-4 col-form-label text-md-right">{{ __('Registro Academico') }}</label>

                            <div class="col-md-6">
                                <input id="registro_academico" type="text" class="form-control{{ $errors->has('registro_academico') ? ' is-invalid' : '' }}" name="registro_academico" value="{{ old('registro_academico') }}" required autofocus>

                                @if ($errors->has('registro_academico'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('registro_academico') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}" required>

                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="id_rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <select id="id_rol" class="form-control{{ $errors->has('id_rol') ? ' is-invalid' : '' }}" name="id_rol" value="{{ old('id_rol') }}" required>
					                @foreach ($roles as $rol)
						                <option value="{{$rol->id_rol}}">{{$rol->nombre_rol}}</option>
					                @endforeach
				                </select>

                                @if ($errors->has('id_rol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_rol') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="pensum_estudiante" class="col-md-4 col-form-label text-md-right">{{ __('Carrera - Pensum') }}</label>

                            <div class="col-md-6">
                                <select id="pensum_estudiante" class="form-control{{ $errors->has('pensum_estudiante') ? ' is-invalid' : '' }}" 
                                    name="pensum_estudiante" value="{{ old('pensum_estudiante') }}" required>
                                    @foreach ($pensums as $pensum)
                                        <option value="{{$pensum->id_pensum}}">{{$pensum->nombre_pensum}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('pensum_estudiante'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pensum_estudiante') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('rol') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" required>

                                @if ($errors->has('direcccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Direccion E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
