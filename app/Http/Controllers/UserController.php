<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $error='Error al iniciar sesión: ';
        if (is_null($request->email) || is_null($request->password)){
            return response()->json($error.'Verifica los datos', 500);
        }

        $user=User::where('email',$request->email)->first();
        if (is_null($user)){
            return response()->json($error.'No existe el usuario', 500); 
        }

        if (Hash::check($request->password, $user->password)){
            return response()->json($user, 200);
        }

        return response()->json($error.'Contraseña incorrecta', 500);
    }

}
