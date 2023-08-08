<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;





class loginController extends Controller
{
    function getLogin()
    {
        return view('auth/login');
    }


    public function login(Request $request)
    {
        $credentials = [
                'NICKNAMEPERSONA' => $request->input('NICKNAMEPERSONA'),
                'CONTRASENIAPERSONA' => $request->input('CONTRASENIAPERSONA'),
            ];


            $hash =  Persona::select('CONTRASENIAPERSONA')
                ->where('NICKNAMEPERSONA',$request->input('NICKNAMEPERSONA'))
                ->get();
            $user = DB::table('persona')->where('NICKNAMEPERSONA', $credentials['NICKNAMEPERSONA'])->first();
            $enteredHashedPassword = hash('sha256', $credentials['CONTRASENIAPERSONA']);
            if($hash[0]['CONTRASENIAPERSONA']==$enteredHashedPassword){
                 // Autenticar al usuario manualmente
                Auth::loginUsingId($user->IDPERSONA);

                $jsonCreated = [
                    'user' => $user,
                ];
                // Guardar el arreglo JSON en la sesión
                session(['userSesion' => $jsonCreated]);

                // Redirigir a la página de inicio o cualquier otra página deseada
                return redirect()->route('index');
            }else{
                return back()->withErrors([
                    'message' => 'Usuario o contraseña incorrectos'
                ]);
            }

            // if (!$user || !$this->checkPassword($credentials['CONTRASENIAPERSONA'], $user->CONTRASENIAPERSONA)) {
            //     // La contraseña es incorrecta
            //     return back()->withErrors([
            //         'message' => 'Usuario o contraseña incorrectos'
            //     ]);
            // }



    }


    public function logout(Request $request)
    {
        auth()->logout();
        session()->forget('userSesion');
        return redirect()->route('index');

    }


}


