<?php
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

// Rotas do Layouts
Route::view('/layouts/app', 'layouts.app');
Route::view('/layouts/form', 'layouts.form');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/about', 'about');

Route::prefix('/pet')->controller(PetController::class)->middleware('auth')->group(function () {
    Route::get('', 'index'); 
    Route::get('/create', 'create')->middleware([IsAdmin::class]); 
    Route::post('/create', 'store')->middleware([IsAdmin::class]); 
    Route::get('/show/{pet}', 'show'); 
    Route::get('/edit/{pet}', 'edit')->middleware([IsAdmin::class]); 
    Route::put('/update/{pet}', 'update')->middleware([IsAdmin::class]);
    Route::delete('/delete/{pet}', 'destroy')->middleware([IsAdmin::class]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
