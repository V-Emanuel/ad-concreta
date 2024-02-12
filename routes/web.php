<?php

use App\Http\Controllers\HeaderViewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth.login');
});

Route::get('/clientes', [HeaderViewsController::class, 'clientsView'])->middleware(['auth', 'verified'])->name('clientes');
Route::get('/atendimentos', [HeaderViewsController::class, 'appointmentsView'])->middleware(['auth', 'verified'])->name('atendimentos');
Route::get('/clientes/{id}', [HeaderViewsController::class, 'clientIdView'])->middleware(['auth', 'verified'])->name('clienteId');

Route::post('/atendimento', [AtendimentoController::class, 'create'])->middleware(['auth', 'verified'])->name('atendimento.post');
Route::post('/cliente', [ClientController::class, 'create'])->middleware(['auth', 'verified'])->name('cliente.post');
Route::post('/clienteDoc', [ClientController::class, 'updateDocument'])->middleware(['auth', 'verified'])->name('cliente.doc');
Route::post('/clienteObs', [ClientController::class, 'updadeObservations'])->middleware(['auth', 'verified'])->name('cliente.obs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
