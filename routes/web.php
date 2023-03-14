<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroUsuarioController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/upload.arquivos', function () {
    return view('upload_arquivos');
})->middleware(['auth', 'verified'])->name('upload.arquivos');

Route::get('/arquivos.enviados', function () {
    return view('arquivos_enviados');
})->middleware(['auth', 'verified'])->name('arquivos.enviados');

Route::get('/cadastro',  [CadastroUsuarioController::class, 'index'])->middleware(['auth', 'verified'])->name('cadastro');

Route::post('/cadastro',  [CadastroUsuarioController::class, 'store'])->middleware(['auth', 'verified'])->name('cadastro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
