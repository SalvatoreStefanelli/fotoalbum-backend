<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlbumController;
use App\Model\Album;


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

Route::get('/album', function () {
    return view('guests.album.index', ['album' => Album::orderByDesc('id')->paginate(6)])->name('guests.album.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/album', [AlbumController::class, 'index'])->name('album');
Route::get('/album/create', [AlbumController::class, 'create'])->name('create');
Route::post('/album/store', [AlbumController::class, 'store'])->name('store');
Route::get('/album/show', [AlbumController::class, 'show'])->name('album.show');
Route::get('/album/edit', [AlbumController::class, 'edit'])->name('album.edit');
Route::put('/album/update', [AlbumController::class, 'update'])->name('album.update');
Route::delete('/album/delete', [AlbumController::class, 'destroy'])->name('album.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
