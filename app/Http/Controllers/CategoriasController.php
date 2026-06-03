<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create(){
        return view('categorias.create');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);        
        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function update(Request $request, $id){
        //dd($request->all(),$id);
        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function show($id){
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    public function desactivate($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->activo = false;
        $categoria->save();
        return redirect()->route('categorias.index')->with('success', 'Categoría desactivada exitosamente.');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
