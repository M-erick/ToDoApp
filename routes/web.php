<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

// Route for fetching all todos
Route::get('/', [TodoController::class, 'index'])->name('todos.index');

// Route for storing a new todo
Route::post('/', [TodoController::class, 'store'])->name('todos.store');

// Route for updating a todo
Route::patch('/{todo}', [TodoController::class, 'update'])->name('todos.update');

// Route for deleting a todo
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
