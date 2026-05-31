<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarrerasController extends Controller
{
    public function index(){
        $carreras = Carrera::paginate(6);
        return view('carreras.index', compact('carreras'));
    }

    public function create(){
        $facultades = Facultad::all();
        return view('carreras.create', compact('facultades'));
    }

    public function edit($id){
        $carrera = Carrera::findOrFail($id);
        $facultades = Facultad::all();
        return view('carreras.edit', compact('carrera', 'facultades'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'facultad_id' => 'required|exists:facultades,id',
            'activo' => 'required|boolean'
        ]);

        Carrera::create($request->all());
        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'facultad_id' => 'required|exists:facultades,id',
            'activo' => 'required|boolean'
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());
        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente.');
    }

    public function show($id){
        $carrera = Carrera::findOrFail($id);
        return view('carreras.show', compact('carrera'));
    }

    public function desactivate($id){
        $carrera = Carrera::findOrFail($id);
        $carrera->activo = false;
        $carrera->save();
        return redirect()->route('carreras.index')->with('success', 'Carrera desactivada exitosamente.');
    }

    public function destroy($id){
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();
        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente.');
    }
}
