<?php

namespace App\Http\Controllers;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;    

class InmobiliariaController extends Controller
{
    //
     // Listar todas las propiedades
    public function index()
    {
        $propiedades = Inmobiliaria::with(['categoria', 'fotos', 'comentarios'])->get();
        return view('loginc.index', compact('propiedades'));
    }

    // Crear nueva propiedad
    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'required|string',
            'comentario' => 'nullable|string',
            'precio' => 'required|numeric',
            'contacto' => 'required|string',
            'fecha_publicacion' => 'nullable|date'
        ]);

        $propiedad = Inmobiliaria::create($validated);

        return response()->json([
            'message' => 'Propiedad creada correctamente',
            'data' => $propiedad
        ], 201);
    }

    // Mostrar una propiedad específica
    public function show($id)
    {
        $propiedad = Inmobiliaria::with(['categoria', 'fotos', 'comentarios'])->findOrFail($id);
        return response()->json($propiedad);
    }

    // Actualizar propiedad
    public function update(Request $request, $id)
    {
        $propiedad = Inmobiliaria::findOrFail($id);

        $validated = $request->validate([
            'categoria_id' => 'sometimes|exists:categorias,id',
            'descripcion' => 'sometimes|string',
            'comentario' => 'nullable|string',
            'precio' => 'sometimes|numeric',
            'contacto' => 'sometimes|string',
            'fecha_publicacion' => 'nullable|date'
        ]);

        $propiedad->update($validated);

        return response()->json([
            'message' => 'Propiedad actualizada correctamente',
            'data' => $propiedad
        ]);
    }

    // Eliminar propiedad
    public function destroy($id)
    {
        $propiedad = Inmobiliaria::findOrFail($id);
        $propiedad->delete();

        return response()->json([
            'message' => 'Propiedad eliminada correctamente'
        ]);
    }

}