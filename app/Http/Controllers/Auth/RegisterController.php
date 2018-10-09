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
        if($data['id_rol'] == 1){
            return $this->agregarUsuarioCatedratico($data);
        }else{
            return $this->agregarUsuarioEstudiante($data);
        }
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

    /**
     * AGREGAR USUARIO GENERAL
     */
    public function agregarUsuario($registro_academico, $nombre, $apellido, $email, $id_rol, $direccion, $password, $pensum_estudiante){
        $salida = User::create([
            'registro_academico' => $registro_academico,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'id_rol' => $id_rol,
            'direccion' => $direccion,      
            'password' => Hash::make($password),
        ]);
      /*  if(!$salida->errors){
            Pensum_estudiante::create([
                'id_pensum' => $pensum_estudiante,
                'id_estudiante' =>$salida->id,
            ]);
            Asignacion_temporal::create([
                'id_pensum' => $pensum_estudiante,
                'id_estudiante' =>$salida->id,
            ]);
        }else{
            $salida = null;
        }*/
        return $salida;
    }
    /**
     * AGREGAR USUARIO DE TIPO CATEDRATICO
     */
    public function agregarUsuarioCatedratico(array $data){
        return $this->agregarUsuario($data['registro_academico'], $data['nombre'], $data['apellido'], 
            $data['email'], 1, $data['direccion'], $data['password'], $data['pensum_estudiante']);
    }
     /**
      * AGREGAR USUARIO DE TIPO ESTUDIANTE
      */
    public function agregarUsuarioEstudiante(array $data){
        return $this->agregarUsuario($data[0], $data[1], $data[2], 
            $data[3], 2, $data[4], $data[5], $data[6]);
    }
      /**
       * VERIFICAR EXISTENCIA USUARIO EN BD
       */
      
    public function existeUsuarioPlataforma($email){
        $usuario =User::where(array(
            'email' => $email
        ))->first();
        if($usuario!=null){
            return true;
        }else{
            return false;
        }
    }
   
     
      /**
       * VERIFICAR SI LA CONFIRMACION DE PASSWORD COINCIDE CON EL PASSWORD INICIAL
       */
    public function confirmarPassword($password1, $password2){
        if($password1 == $password2){
            return true;
        }else{
            return false;
        }
    }

      /**
       * VERIFICAR QUE EL CORREO PROPORCIONADO CUMPLA CON EL FORMATO PARA EMAIL
       */
    public function verificarFormatoCorreo($correo){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }else{
            return true;
        }
    }

}
