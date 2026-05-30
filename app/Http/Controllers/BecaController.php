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
}
