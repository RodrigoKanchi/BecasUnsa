<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = User::paginate(10);
        $activos = User::where('activo', true)->count();
        $inactivos = User::where('activo', false)->count();
        $cantAdmin = $usuarios->filter(function($user) {
            return $user->hasRole('Administrador');
        })->count();
        $cantUser = User::all()->count();
        return view('usuarios.index', compact('usuarios', 'activos', 'inactivos', 'cantAdmin', 'cantUser'));
    }

    public function create(){
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6'
        ]);

        $usuario = User::findOrFail($id);
        $data = $request->all();
        if(empty($data['password'])){
            unset($data['password']);
        }
        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function show($id){
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function desactivate($id){
        $usuario = User::findOrFail($id);
        $usuario->activo = false;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado exitosamente.');
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
