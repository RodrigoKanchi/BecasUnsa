<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index(){
        $this->authorize('view',User::class);
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
        $this->authorize('create',User::class);
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }

    public function edit($id){
        $this->authorize('update',User::class);
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function store(Request $request){
        $this->authorize('create',User::class);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];
        $nuevo = User::create($data);
        $nuevo->assignRole($request->input('rol'));

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function update(Request $request, $id){
        $this->authorize('update',User::class);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6'
        ]);

        $usuario = User::findOrFail($id);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];
        if(empty($data['password'])){
            unset($data['password']);
        }
        if(!empty($data['rol'])){
            $usuario->syncRoles($data['rol']);
        }
        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function show($id){
        $this->authorize('view',User::class);
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function desactivate($id){
        $this->authorize('delete',User::class);
        $usuario = User::findOrFail($id);
        $usuario->activo = false;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado exitosamente.');
    }

    public function destroy($id){
        $this->authorize('delete',User::class);
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
