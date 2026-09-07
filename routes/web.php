<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\InmobiliariaController;

Route::get('/', [InmobiliariaController::class, 'index'])->name('loginc.index'); //vista del pagina de inicio del restaurante

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

///////////////// login vista inicio

Route::get('/login', [loginController::class, 'showLoginForm'])->name('login'); // vista de inicioo de sesion del login 
Route::post('/login', [loginController::class, 'login']);
//
Route::get('/test-db', [loginController::class, 'testDB']);
use App\Http\Controllers\UsuarioslgController;

Route::get('/usuariosg', [UsuarioslgController::class, 'index'])->name('loginc.usuariosg');
Route::resource('usuarios', UsuarioslgController::class); // Rutas para el CRUD de usuarios
//


Route::get('/inmobiliaria', [InmobiliariaController::class, 'index'])->name('dashb.dasbord'); // Listar todas las propiedades
//Route::post('/inmobiliaria', [InmobiliariaController::class, 'store']);
//Route::get('/inmobiliaria/{id}', [InmobiliariaController::class, 'show']);
//Route::put('/inmobiliaria/{id}', [InmobiliariaController::class, 'update']);
//Route::delete('/inmobiliaria/{id}', [InmobiliariaController::class, 'destroy']);
