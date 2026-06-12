<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beca;
use App\Models\Categoria;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\BecaCarrera;
use App\Models\BecaFacultad;


//BACKEND
class BecasController extends Controller
{
    public function index()
    {
        $becas = Beca::paginate(6);
        return view('becas.index',compact('becas'));
    }

    public function create(){
        $categorias = Categoria::all();
        $carreras = Carrera::all();
        $facultades = Facultad::all();
        return view('becas.create', compact('categorias', 'carreras', 'facultades'));
    }

    public function edit($id){
        $beca = Beca::findOrFail($id);
        return view('becas.edit', compact('beca'));
    }

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'string',
            'categoria_id' => 'required|exists:categorias,id',
            'correo_contacto' => 'required',
            'fecha_inscripcion' => 'required|date',
            'fecha_limite' => 'required|date|after_or_equal:fecha_inicio',
            'activo' => 'required|boolean',
            'link_resolucion' => 'required'
        ]);
        //dd($request, $request->input('categoria_id'));
        $carreras = Carrera::whereIn('id', $request->input('carreras'))->get();
        $facultades = Facultad::whereIn('id', $request->input('facultades'))->get();
        $beca = Beca::create($request->all());
        foreach($carreras as $carrera){
            BecaCarrera::create([
                'beca_id' => $beca->id,
                'carrera_id' => $carrera->id
            ]);
        }
        foreach($facultades as $facultad){
            BecaFacultad::create([
                'beca_id' => $beca->id,
                'facultad_id' => $facultad->id
            ]);
        }
        return redirect()->route('becas.index')->with('success', 'Beca creada exitosamente.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'string',
            'categoria' => 'required|exists:categorias,id',
            'contacto' => 'required',
            'fecha_inscripcion' => 'required|date',
            'fecha_limite' => 'required|date|after_or_equal:fecha_inicio',
            'activo' => 'required|boolean',
            'resolucion' => 'required'
        ]);

        $beca = Beca::findOrFail($id);
        $beca->update($request->all());
        $carreras = Carrera::whereIn('id', $request->input('carreras'))->get();
        $facultades = Facultad::whereIn('id', $request->input('facultades'))->get();
        //Modificar para update
        foreach($carreras as $carrera){
            BecaCarrera::create([
                'beca_id' => $beca->id,
                'carrera_id' => $carrera->id
            ]);
        }
        foreach($facultades as $facultad){
            BecaFacultad::create([
                'beca_id' => $beca->id,
                'facultad_id' => $facultad->id
            ]);
        }

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
