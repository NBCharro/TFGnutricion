<?php

namespace App\Http\Controllers\Auth;

use App\Custom\DataBaseController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        /**
         * Comprueba si existe conexión con la base de datos.
         * Si no existe, redirigir a la página de error.
         *
         */
        $funcion_no_existe_conexion_db = new DataBaseController;
        $no_existe_conexion_db = $funcion_no_existe_conexion_db->comprobar_no_existe_conexion_db();
        if ($no_existe_conexion_db) {
            return view('error');
        }

        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
}
