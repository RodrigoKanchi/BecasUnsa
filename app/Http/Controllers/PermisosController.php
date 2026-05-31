<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    public function index(){
        $permisos = Permission::paginate(6);
        return view('permisos.index', compact('permisos'));
    }

    public function create(){
        return view('permisos.create');
    }

    public function edit($id){
        $permiso = Permission::findOrFail($id);
        return view('permisos.edit', compact('permiso'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create($request->all());
        return redirect()->route('permisos.index')->with('success', 'Permiso creado exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $permiso = Permission::findOrFail($id);
        $permiso->update($request->all());
        return redirect()->route('permisos.index')->with('success', 'Permiso actualizado exitosamente.');
    }

    public function show($id){
        $permiso = Permission::findOrFail($id);
        return view('permisos.show', compact('permiso'));
    }

    public function destroy($id){
        $permiso = Permission::findOrFail($id);
        $permiso->delete();
        return redirect()->route('permisos.index')->with('success', 'Permiso eliminado exitosamente.');
    }
    
    public function desactivate($id){
        $permiso = Permission::findOrFail($id);
        $permiso->activo = false;
        $permiso->save();
        return redirect()->route('permisos.index')->with('success', 'Permiso desactivado exitosamente.');
    }
}
