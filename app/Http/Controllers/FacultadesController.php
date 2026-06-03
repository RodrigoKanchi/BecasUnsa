<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultad;

class FacultadesController extends Controller
{
    public function index(){
        $facultades = Facultad::paginate(6);
        return view('facultades.index', compact('facultades'));
    }

    public function create(){
        return view('facultades.create');
    }

    public function edit($id){
        $facultad = Facultad::findOrFail($id);
        return view('facultades.edit', compact('facultad'));
    }

    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);

        Facultad::create($request->all());
        return redirect()->route('facultades.index')->with('success', 'Facultad creada exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);

        $facultad = Facultad::findOrFail($id);
        $facultad->update($request->all());
        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada exitosamente.');
    }

    public function show($id){
        $facultad = Facultad::findOrFail($id);
        return view('facultades.show', compact('facultad'));
    }

    public function desactivate($id){
        $facultad = Facultad::findOrFail($id);
        $facultad->activo = false;
        $facultad->save();
        return redirect()->route('facultades.index')->with('success', 'Facultad desactivada exitosamente.');
    }

    public function destroy($id){
        $facultad = Facultad::findOrFail($id);
        $facultad->delete();
        return redirect()->route('facultades.index')->with('success', 'Facultad eliminada exitosamente.');
    }
}
