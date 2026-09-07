<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Importar Storage para manejar archivos

class UsuarioslgController extends Controller
{
    //
    // 📄 Mostrar todos los usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('loginc.usuariosg', compact('usuarios'));
    }

    // ➕ Formulario de creación
    public function create()
    {
        return view('loginc.create');
    }

    // ✅ Guardar nuevo usuario
 public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // ===== AQUÍ VA EL CÓDIGO DE LA FOTO =====
    $foto = null; // Valor por defecto si no sube foto
    if ($request->hasFile('foto')) {
        // Guarda la imagen en storage/app/public/fotos y devuelve la ruta
        $foto = $request->file('foto')->store('fotos', 'public');
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'foto' => $foto, // Aquí se guarda la ruta de la imagen (ej: "fotos/abc123.jpg")
    ]);

    return redirect()->route('loginc.usuariosg')->with('success', 'Usuario creado correctamente.');
}

    // ✏️ Formulario de edición
    public function edit($id)
    {
        $usuario = User::findOrFail($id); //modelo User para buscar el usuario por su ID
        return view('loginc.edit', compact('usuario'));
    }

    // 🔄 Actualizar usuario
public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $usuario->id,
        'password' => 'nullable|string|min:6',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $usuario->name = $request->name;
    $usuario->email = $request->email;

    // Actualizar contraseña solamente si se escribió una nueva
    if ($request->filled('password')) {
        $usuario->password = Hash::make($request->password);
    }

    // Si se subió una nueva foto
    if ($request->hasFile('foto')) {

        // Eliminar la foto anterior
        if ($usuario->foto && Storage::disk('public')->exists($usuario->foto)) {
            Storage::disk('public')->delete($usuario->foto);
        }

        // Guardar la nueva foto
        $usuario->foto = $request->file('foto')->store('usuarios/fotos', 'public');
    }

    $usuario->save();

    return redirect()
        ->route('loginc.usuariosg')
        ->with('success', 'Usuario actualizado correctamente.');
}

    // 🗑️ Eliminar usuario
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('loginc.usuariosg')->with('success', 'Usuario eliminado correctamente.');
    }
}
