<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EventController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [EventController::class, 'index']);

//->middleware('auth'); Acrescentado para permitir criar evento somente quando logado.
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class,'update' ])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/usuarios', [UsuarioController::class, 'show'])->middleware('auth');;

//Aqui foi alterada o controle de view para a controller de eventos.
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

//Será excluído pois usaremos uma nova rota para depois do login de usuário dentro de events.
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');