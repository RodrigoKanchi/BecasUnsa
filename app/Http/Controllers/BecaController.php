<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beca;


//CONEXION APLICACION MOVIL
class BecaController extends Controller
{
    public function index()
    {
        // Devolvemos todas las becas en formato JSON        
        return response()->json(Beca::all());
    }

    // Funciones para buscar(nombre, facultad?, carrera?). facultad(id), carrera(id) todos retornando json. show(id)
    public function show($id)
    {
        // Devolvemos una beca específica por su ID en formato JSON

        $beca = Beca::find($id);
        $json = [
            'id' => $beca->id,
            'titulo' => $beca->titulo,
            'descripcion' => $beca->descripcion,
            'fecha_inscripcion' => $beca->fecha_inscripcion,
            'fecha_limite' => $beca->fecha_limite,
            'categoria_id' => $beca->categoria_id,
            'link_resolucion' => $beca->link_resolucion,
            'correo_contacto' => $beca->correo_contacto,
            'carreras' => $beca->carreras()->pluck('nombre'),
            'facultades' => $beca->facultades()->pluck('nombre')
        ];
    
        if ($beca) {
            return response()->json($json);
        } else {
            return response()->json(['message' => 'Beca no encontrada'], 404);
        }
    }
}
