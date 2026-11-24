<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;



class AuthController extends Controller
{

    /**
     * Registrarse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
    }

    /**
     * Iniciar sesión
     */
public function login(LoginRequest $request)
{
    // Busco el usuario a través del email validado
    $user = User::where('email', $request->validated('email'))->first();

    // Doy por hecho que el cliente va a poner mal su contraseña
    $passwordOk = false;

    // Si el usuario buscado existe, compruebo que su contraseña, al "deshashear" lo que tengo en la BD, coincida con ello

    if ($user) {
        // Hash check devuelve true o false
        $passwordOk = Hash::check($request->validated('password'), $user->password);
    }

    // Si la contraseña coincide, le creo un token al usuario y le devuelvo un 200 deteniendo el programa
    if ($passwordOk) {

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión correcto.',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ], 200);
    }

    // si la contraseña falla, detengo la petición
    return response()->json([
        'message' => 'Credenciales inválidas.',
    ], 401);
}

    /**
     * Cerrar sesión
     */
    public function logout(string $id)
    {
        //
    }
}
