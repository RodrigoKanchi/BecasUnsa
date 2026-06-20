<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\RedirectResponse;
use App\Models\Facultad;
use Illuminate\Support\Facades\Auth;

class FacultadesController extends Controller
{
    public function index(){
        $this->authorize('view',Facultad::class);
        $facultades = Facultad::paginate(6);
        return view('facultades.index', compact('facultades'));
    }

    public function create(){
        $this->authorize('create',Facultad::class);
        return view('facultades.create');
    }

    public function edit($id){
        $this->authorize('update',Facultad::class);
        $facultad = Facultad::findOrFail($id);
        return view('facultades.edit', compact('facultad'));
    }

    public function store(Request $request){
        //dd($request->all());
        $this->authorize('create',Facultad::class);
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);

        Facultad::create($request->all());
        return redirect()->route('facultades.index')->with('success', 'Facultad creada exitosamente.');
    }

    public function update(Request $request, $id){
        $this->authorize('update',Facultad::class);
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);

        $facultad = Facultad::findOrFail($id);
        $facultad->update($request->all());
        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada exitosamente.');
    }

    public function show($id){
        $this->authorize('view',Facultad::class);
        $facultad = Facultad::findOrFail($id);
        return view('facultades.show', compact('facultad'));
    }

    public function desactivate($id){
        $this->authorize('delete',Facultad::class);
        $facultad = Facultad::findOrFail($id);
        $facultad->activo = false;
        $facultad->save();
        return redirect()->route('facultades.index')->with('success', 'Facultad desactivada exitosamente.');
    }

    public function destroy($id){
        $this->authorize('delete',Facultad::class);    
        $facultad = Facultad::findOrFail($id);
        $facultad->delete();
        return redirect()->route('facultades.index')->with('success', 'Facultad eliminada exitosamente.');
    }
}
