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
        $this->authorize('view',Beca::class);
        $becas = Beca::paginate(6);
        return view('becas.index',compact('becas'));
    }

    public function create(){
        $this->authorize('create',Beca::class);
        $categorias = Categoria::all();
        $carreras = Carrera::all();
        $facultades = Facultad::all();
        return view('becas.create', compact('categorias', 'carreras', 'facultades'));
    }

    public function edit($id){
        $this->authorize('update',Beca::class);
        $categorias = Categoria::all();
        $carreras = Carrera::all();
        $facultades = Facultad::all();
        $beca = Beca::findOrFail($id);
        $beca_carreras = $beca->carreras()->pluck('carrera_id')->toArray();
        $beca_facultades = $beca->facultades()->pluck('facultad_id')->toArray();
        return view('becas.edit', compact('beca','categorias','carreras','facultades','beca_carreras','beca_facultades'));
    }

    public function store(Request $request){
        $this->authorize('update',Beca::class);
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'correo_contacto' => 'required',
            'fecha_inscripcion' => 'required|date',
            'fecha_limite' => 'required|date|after_or_equal:fecha_inicio',
            'activo' => 'required|boolean',
            'link_resolucion' => 'required'
        ]);
        $carreras = $request->input('carreras');
        
        $beca = Beca::create($request->all());
        if($carreras != null){
            $carreras = Carrera::whereIn('id', $request->input('carreras'))->get();
            foreach($carreras as $carrera){
            BecaCarrera::create([
                'beca_id' => $beca->id,
                'carrera_id' => $carrera->id
            ]);
        }
            }
        if($request->input('facultades') != null){
            $facultades = Facultad::whereIn('id', $request->input('facultades'))->get();
            foreach($facultades as $facultad){
            BecaFacultad::create([
                'beca_id' => $beca->id,
                'facultad_id' => $facultad->id
            ]);
            }
        }
        //dd($facultades);
       
        
        
        return redirect()->route('becas.index')->with('success', 'Beca creada exitosamente.');
    }

    public function update(Request $request, $id){
        //dd($request);
        $this->authorize('update',Beca::class);
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'correo_contacto' => 'required',
            'fecha_inscripcion' => 'required|date',
            'fecha_limite' => 'required|date|after_or_equal:fecha_inicio',
            'activo' => 'required|boolean',
            'link_resolucion' => 'required'
        ]);

        $beca = Beca::findOrFail($id);
        $beca->update($request->all());
        if($request->input('carreras') != null){
            $carreras = $request->input('carreras');
            $beca->carreras()->sync($carreras);
        }
        if ($request->input('facultades') != null){
            $facultades = $request->input('facultades');
            $beca->facultades()->sync($facultades);
        }
        

        return redirect()->route('becas.index')->with('success', 'Beca actualizada exitosamente.');
    }

    public function show($id){
        $this->authorize('view',Beca::class);
        $beca = Beca::findOrFail($id);
        //dd($carreras);
        return view('becas.show', compact('beca'));
    }

    public function desactivate($id){
        $this->authorize('delete',Beca::class);
        $beca = Beca::findOrFail($id);
        $beca->activo = false;
        $beca->save();

        return redirect()->route('becas.index')->with('success', 'Beca desactivada exitosamente.');
    }

    public function destroy($id){
        $this->authorize('delete',Beca::class);
        $beca = Beca::findOrFail($id);
        $beca->delete();

        return redirect()->route('becas.index')->with('success', 'Beca eliminada exitosamente.');
    }

}
