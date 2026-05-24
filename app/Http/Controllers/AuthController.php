<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /* Registro de usuario */

    public function register(Request $request)
    {
        // 1. Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id'  => 'required|exists:roles,id', // Debe existir en la tabla roles
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // 2. Crear el usuario en MySQL
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password), // Encriptar contraseña
            'role_id'   => $request->role_id,
            'fcm_token' => $request->fcm_token, // Opcional por ahora
        ]);

        // 3. Generar el Token de acceso para Flutter
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data'         => $user,
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 201);
    }

    /* Inicio de sesión */

    public function login(Request $request)
    {
        // 1. Validar que vengan los datos necesarios
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // 2. Buscar al usuario por email (según ESQUEMA.PNG)
        $user = User::where('email', $request->email)->first();

        // 3. Verificar si existe y si la contraseña coincide
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales son incorrectas.'
            ], 401);
        }

        // 4. (Opcional) Actualizar el FCM Token si viene en la petición
        if ($request->has('fcm_token')) {
            $user->update(['fcm_token' => $request->fcm_token]);
        }

        // 5. Generar nuevo Token para la sesión móvil
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data'         => $user,
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }

    /* Cerrar sesión (Revocar token) */

    public function logout(Request $request)
    {
        // Eliminamos el token que está usando el usuario actualmente
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada exitosamente.'
        ]);
    }
}
