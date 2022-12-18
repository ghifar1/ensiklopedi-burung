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

Route::get('/', function (\Illuminate\Http\Request $request) {
    $birds = \App\Models\Bird::where('is_deleted', false)->paginate(5);
    return view('welcome', compact('birds'));
});

Route::get('/map', function (\Illuminate\Http\Request $request) {
    $birdFamilies = \App\Models\BirdFamily::all();
    return view('classification', compact('birdFamilies'));
})->name('classification');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// bird family routes
Route::get('/bird_family', [App\Http\Controllers\BirdFamilyController::class, 'index'])->name('bird_family.index');
Route::get('/bird_family/create', [App\Http\Controllers\BirdFamilyController::class, 'create'])->name('bird_family.create');
Route::post('/bird_family', [App\Http\Controllers\BirdFamilyController::class, 'store'])->name('bird_family.store');
Route::get('/bird_family/{id}', [App\Http\Controllers\BirdFamilyController::class, 'show'])->name('bird_family.show');
Route::get('/bird_family/{id}/edit', [App\Http\Controllers\BirdFamilyController::class, 'edit'])->name('bird_family.edit');
Route::put('/bird_family/{id}', [App\Http\Controllers\BirdFamilyController::class, 'update'])->name('bird_family.update');
Route::delete('/bird_family/{id}', [App\Http\Controllers\BirdFamilyController::class, 'destroy'])->name('bird_family.destroy');

// bird genus routes
Route::get('/bird_genus', [App\Http\Controllers\BirdGenusController::class, 'index'])->name('bird_genus.index');
Route::get('/bird_genus/create', [App\Http\Controllers\BirdGenusController::class, 'create'])->name('bird_genus.create');
Route::post('/bird_genus', [App\Http\Controllers\BirdGenusController::class, 'store'])->name('bird_genus.store');
Route::get('/bird_genus/{id}', [App\Http\Controllers\BirdGenusController::class, 'show'])->name('bird_genus.show');
Route::get('/bird_genus/{id}/edit', [App\Http\Controllers\BirdGenusController::class, 'edit'])->name('bird_genus.edit');
Route::put('/bird_genus/{id}', [App\Http\Controllers\BirdGenusController::class, 'update'])->name('bird_genus.update');
Route::delete('/bird_genus/{id}', [App\Http\Controllers\BirdGenusController::class, 'destroy'])->name('bird_genus.destroy');

// birds routes
Route::get('/birds', [App\Http\Controllers\BirdController::class, 'index'])->name('birds.index');
Route::get('/birds/create', [App\Http\Controllers\BirdController::class, 'create'])->name('birds.create');
Route::post('/birds', [App\Http\Controllers\BirdController::class, 'store'])->name('birds.store');
Route::get('/birds/{id}', [App\Http\Controllers\BirdController::class, 'show'])->name('birds.show');
Route::get('/birds/{id}/edit', [App\Http\Controllers\BirdController::class, 'edit'])->name('birds.edit');
Route::put('/birds/{id}', [App\Http\Controllers\BirdController::class, 'update'])->name('birds.update');
Route::delete('/birds/{id}', [App\Http\Controllers\BirdController::class, 'destroy'])->name('birds.destroy');
Route::POST('/birds/{id}/restore', [App\Http\Controllers\BirdController::class, 'restore'])->name('birds.restore');







