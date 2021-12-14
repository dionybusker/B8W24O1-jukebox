<?php

use App\Models\Genre;
use App\Models\Song;
use App\Http\Controllers\SavedListController;
use App\Http\Controllers\SongController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genres', function () {
    return view('genres', [
        'genres' => Genre::all()
    ]);
})->name('genres');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/songs', function () {
    return view('songs', [
        'songs' => Song::with('genre')->get(),
        'genres' => Genre::all(),
    ]);
})->name('songs');

Route::get('genres/{genre}', function (Genre $genre) {
    return view('songs', [
        'songs' => $genre->songs
    ]);
});

Route::get('/queuelist', function () {
    return view('queuelist', [
        'songs' => Song::all(),
        'genres' => Genre::all()
    ]);
})->name('queuelist');

Route::get('/playlists', function () {
    return view('playlists', [
        'songs' => Song::all(),
        'genres' => Genre::all()
    ]);
})->name('playlists');

//Route::get("/songs/add/{song}", [
//    SavedListController::class, 'store'
//]);

Route::get('/songs/{id}', [SavedListController::class, 'create']);
Route::post('/songs/{id}', [SavedListController::class, 'session']);
Route::get('/queuelist/{id}', [SavedListController::class, 'create']);
Route::post('/queuelist/{id}', [SavedListController::class, 'delete']);

//Route::get('/songs/{id}', [SongController::class, 'create']);
//Route::post('/songs/{id}', [SongController::class, 'store']);

