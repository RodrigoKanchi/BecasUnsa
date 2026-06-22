<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Favorito;
use App\Models\Beca;

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
            //'role_id'  => 'required|exists:roles,id', // Debe existir en la tabla roles
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // 2. Crear el usuario en MySQL
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password), // Encriptar contraseña
            //'role_id'   => $request->role_id,
            'fcm_token' => $request->fcm_token, // Opcional por ahora
        ]);
        $user->assignRole('Usuario');

        // 3. Generar el Token de acceso para Flutter
        $token = $user->createToken('auth_token',['*'], now()->addHours(2))->plainTextToken;

        return response()->json([
            'data'         => $user,
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 201);
    }

    public function update(Request $request){
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>$request</info>");
        $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'password' => 'nullable',
            'email' => 'required'
        ]);


        $user = User::find($request->input('id'));
        
        if($request->input('password') == ''){
            $data = [
            'name' => $request->input('nombre'),
            'email' => $request->input('email')
            ];
        }else{
            $data = [
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
            ];
        }
        $user->update($data);

        return response()->noContent();

    }

    /* Inicio de sesión */

    public function login(Request $request)
    {
        //$output = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$output->writeln("<info>$request</info>");
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
        //$role = $user->roles()->first();
        //$roleId = $role ? $role->id : null;

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
        $token = $user->createToken('auth_token',['*'], now()->addHours(2))->plainTextToken;
        //$output->writeln("<info>$token</info>");

        return response()->json([
            'data'         => [
                'id'       => $user->id,
                'nombre'   => $user->name,
                'email'    => $user->email,
                //'role_id'  => $roleId,
                'fcm_token' => $user->fcm_token,
            ],
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

    public function marcarFavorito(Request $request){
        $request->validate([
            'id' => 'required',
            'beca_id' => 'required'
        ]);
        $data = [
            'user_id' => $request->input('id'),
            'beca_id' => $request->input('beca_id')
        ];
        $fav = Favorito::where($data)->first();
        if($fav == null){
            Favorito::create($data);
        }

        return response()->noContent();
    }
        
    

    public function desmarcarFavorito(Request $request){
        $request->validate([
            'id' => 'required',
            'beca_id' => 'required'
        ]);
        $data = [
            'user_id' => $request->input('id'),
            'beca_id' => $request->input('beca_id')
        ];
        $fav = Favorito::where($data)->first();
        if($fav != null){
            Favorito::destroy($fav->id);
        }

        return response()->noContent();
    }

    public function verFavoritos(Request $request){
        $request->validate([
            'id' => 'required',
        ]);
        $favoritos = Favorito::where('user_id', $request->input('id'))->pluck('beca_id')->toArray(); 
        $becas = Beca::whereIn('id',$favoritos)->get();  
        foreach($becas as $beca){
            $beca['esFavorito'] = true;
        }
        return response()->json($becas);
    }
    
}
