<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cursosporsemestre/1/semestre';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Este metodo sirve para restablecer el password dado un email especifico. 
     */
    public function RestablecerPassword($email,$password){
        $usuario =User::where(array(
            'email' => $email
        ))->first();

        $pass = Hash::make($password);
        $usuario -> password = $pass;
        return $usuario;
    }

    /**
     * Este metodo es para obtener a un usuario dado el correo
     */
    public function ObtenerUsuario($email){
        $usuario =User::where(array(
            'email' => $email
        ))->first();
        return $usuario;
    }
}
