<?php
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionController;
use Illuminate\Support\Facades\Route;

// Rotas do Layouts
Route::view('/layouts/app', 'layouts.app');
Route::view('/layouts/form', 'layouts.form');

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', function () {
    $adoptions = App\Models\Adoption::all();
    return view('dashboard', compact('adoptions'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/about', 'about');

Route::get('/pet', [PetController::class, 'index']); 

Route::prefix('/pet')->controller(PetController::class)->middleware('auth')->group(function () {
    Route::get('/create', 'create')->middleware([IsAdmin::class]); 
    Route::post('/create', 'store')->middleware([IsAdmin::class]); 
    Route::get('/show/{pet}', 'show'); 
    Route::get('/edit/{pet}', 'edit')->middleware([IsAdmin::class]); 
    Route::put('/update/{pet}', 'update')->middleware([IsAdmin::class]);
    Route::delete('/delete/{pet}', 'destroy')->middleware([IsAdmin::class]);
});

Route::prefix('/adoption')->controller(AdoptionController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->middleware([IsAdmin::class]); 
    Route::get('/create', 'create')->middleware([IsAdmin::class]); 
    Route::post('/create', 'store'); 
    Route::get('/show/{adoption}', 'show'); 
    Route::get('/edit/{adoption}', 'edit')->middleware([IsAdmin::class]); 
    Route::put('/update/{adoption}', 'update')->middleware([IsAdmin::class]);
    Route::delete('/delete/{adoption}', 'destroy')->middleware([IsAdmin::class]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
