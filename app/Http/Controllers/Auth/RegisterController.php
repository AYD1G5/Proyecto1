<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Pensum;
use App\Asignacion_temporal;
use App\Pensum_estudiante;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'registro_academico' => 'required|string|max:255|unique:users',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'id_rol' => 'required|string|max:255',
            'pensum_estudiante' => 'required|string|max:255',
            'direccion' => 'string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $salida = User::create([
            'registro_academico' => $data['registro_academico'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'id_rol' => $data['id_rol'],
            'direccion' => $data['direccion'],      
            'password' => Hash::make($data['password']),
        ]);
        if(!$salida->errors){
            Pensum_estudiante::create([
                'id_pensum' => $data['pensum_estudiante'],
                'id_estudiante' =>$salida->id,
            ]);
            Asignacion_temporal::create([
                'id_pensum' => $data['pensum_estudiante'],
                'id_estudiante' =>$salida->id,
            ]);
        }
        return $salida;
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $pensums=Pensum::all();
        $roles=Rol::all();
        return view('auth.register', ['pensums'=>$pensums, 'roles'=>$roles]);
    }
}
