<?php

namespace App\Http\Controllers;
Use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{

    public function showLoginForm()
    {
        return view('loginc.login'); // tu vista Blade
    }
    /////
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password'); 

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        return redirect()->route('loginc.index');
    }

    return back()->withErrors([
        'email' => 'Las credenciales no son correctas.',
    ]);
}
}