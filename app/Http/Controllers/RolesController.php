<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create(){
        $permisos = Permission::all();
        return view('roles.create', compact('permisos'));
    }

    public function edit($id){
        $rol = Role::findOrFail($id);
        $permisos = Permission::all();
        return view('roles.edit', compact('rol','permisos'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $rol = Role::findOrFail($id);
        $rol->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function show($id){
        $rol = Role::findOrFail($id);
        $permisos = $rol->permissions->pluck('name');
        return view('roles.show', compact('rol', 'permisos'));
    }

    public function destroy($id){
        $rol = Role::findOrFail($id);
        $rol->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
    
    public function desactivate($id){
        $rol = Role::findOrFail($id);
        $rol->activo = false;
        $rol->save();
        return redirect()->route('roles.index')->with('success', 'Rol desactivado exitosamente.');
    }
}
