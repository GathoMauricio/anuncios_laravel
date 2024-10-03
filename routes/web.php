<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/municipios/{id?}', [App\Http\Controllers\SepomexController::class, 'minicipios'])->name('municipios');
Route::get('/colonias/{id?}', [App\Http\Controllers\SepomexController::class, 'colonias'])->name('colonias');
Route::get('/cp/{id?}', [App\Http\Controllers\SepomexController::class, 'cp'])->name('cp');
Route::get('/ver_anuncio/{id}', [App\Http\Controllers\AnuncioController::class, 'show'])->name('ver_anuncio');
Route::get('/buscar', [App\Http\Controllers\AnuncioController::class, 'buscar'])->name('buscar');
Route::get('/todo', [App\Http\Controllers\AnuncioController::class, 'todo'])->name('todo');
Route::get('/anuncios', [App\Http\Controllers\AnuncioController::class, 'index'])->name('anuncios')->middleware('auth');
Route::get('/mis_anuncios', [App\Http\Controllers\AnuncioController::class, 'misAnuncios'])->name('mis_anuncios')->middleware('auth');
Route::get('/editar_anuncio/{id}', [App\Http\Controllers\AnuncioController::class, 'editarAnuncio'])->name('editar_anuncio')->middleware('auth');
Route::get('/crear_anuncio', [App\Http\Controllers\AnuncioController::class, 'create'])->name('crear_anuncio')->middleware('auth');
Route::post('/store_anuncio', [App\Http\Controllers\AnuncioController::class, 'store'])->name('store_anuncio')->middleware('auth');
Route::put('/update_anuncio/{id}', [App\Http\Controllers\AnuncioController::class, 'update'])->name('update_anuncio')->middleware('auth');
Route::get('/pago_exitoso/{id}', [App\Http\Controllers\AnuncioController::class, 'pagoExitoso'])->name('pago_exitoso');
Route::get('/hacer_premium/{id}', [App\Http\Controllers\AnuncioController::class, 'hacerPremium'])->name('hacer_premium')->middleware('auth');
Route::get('/subcategorias/{id?}', [App\Http\Controllers\CategoriaController::class, 'subcategorias'])->name('subcategorias');
Route::get('/cuenta', [App\Http\Controllers\UserController::class, 'cuenta'])->name('cuenta')->middleware('auth');
Route::put('/actualizar_cuenta', [App\Http\Controllers\UserController::class, 'actualizarCuenta'])->name('actualizar_cuenta')->middleware('auth');
Route::put('/actualizar_contrasena', [App\Http\Controllers\UserController::class, 'actualizarPassword'])->name('actualizar_contrasena')->middleware('auth');
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios')->middleware('auth');
