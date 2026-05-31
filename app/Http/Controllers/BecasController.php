<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beca;


//BACKEND
class BecasController extends Controller
{
    public function index()
    {
        $becas = Beca::paginate(6);
        return view('becas.index',compact('becas'));
    }

    public function create(){
        return view('becas.create');
    }

    public function edit($id){
        $beca = Beca::findOrFail($id);
        return view('becas.edit', compact('beca'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'requisitos' => 'required',
            'beneficios' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'activo' => 'required|boolean'
        ]);

        $beca = Beca::create($request->all());

        return redirect()->route('becas.index')->with('success', 'Beca creada exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'requisitos' => 'required',
            'beneficios' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'activo' => 'required|boolean'
        ]);

        $beca = Beca::findOrFail($id);
        $beca->update($request->all());

        return redirect()->route('becas.index')->with('success', 'Beca actualizada exitosamente.');
    }

    public function show($id){
        $beca = Beca::findOrFail($id);
        $carreras = $beca->carreras();
        //dd($carreras);
        return view('becas.show', compact('beca','carreras'));
    }

    public function desactivate($id){
        $beca = Beca::findOrFail($id);
        $beca->activo = false;
        $beca->save();

        return redirect()->route('becas.index')->with('success', 'Beca desactivada exitosamente.');
    }

    public function destroy($id){
        $beca = Beca::findOrFail($id);
        $beca->delete();

        return redirect()->route('becas.index')->with('success', 'Beca eliminada exitosamente.');
    }

}
