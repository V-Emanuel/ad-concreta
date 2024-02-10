<?php

use App\Http\Controllers\HeaderViewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
