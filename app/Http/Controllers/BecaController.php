<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beca;
use App\Models\Favorito;


//CONEXION APLICACION MOVIL
class BecaController extends Controller
{
    public function index()
    {
        // Devolvemos todas las becas en formato JSON        
        return response()->json(Beca::all());
    }

    // Funciones para buscar(nombre, facultad?, carrera?). facultad(id), carrera(id) todos retornando json. show(id)
    public function buscar(Request $request)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>$request</info>");
        // Buscamos becas por nombre, facultad y carrera
        $query = Beca::query();
        //dd($query);

        $nombre = $request->input('titulo');
        $facultad = $request->input('facultad');
        $carrera = $request->input('carrera');

        $query->where('fecha_limite','>=',now());

        if ($nombre) {
            $query->where('titulo', 'like', '%'.$nombre.'%');
        }


        $query->when($facultad, function ($q) use ($facultad) {
            $q->whereHas('facultades', function ($q) use ($facultad) {
                $q->where('facultades.nombre','like', '%'.$facultad.'%');
            });
        });


        $query->when($carrera, function ($q) use ($carrera) {
            $q->whereHas('carreras', function ($q) use ($carrera) {
                $q->where('carreras.nombre','like', '%'.$carrera.'%');
            });
        });

        $becas = $query->get();
        foreach($becas as $beca){
            $beca['esFavorito'] = Favorito::where('user_id',$request->input('id'))->where('beca_id',$beca['id'])->exists();
        }
        return response()->json($query->get());
    }


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
            'facultades' => $beca->facultades()->pluck('nombre'),
        ];
    
        if ($beca) {
            return response()->json($json);
        } else {
            return response()->json(['message' => 'Beca no encontrada'], 404);
        }
    }
}
