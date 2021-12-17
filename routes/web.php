<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\QueuelistController;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Song;
use App\Http\Controllers\PlaylistController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::get('/songs', [SongController::class, 'index'])->name('songs');
Route::get('/queuelist', [QueuelistController::class, 'index'])->name('queuelist');

Route::get('genres/{genre}', function (Genre $genre) {
    return view('songs', [
        'songs' => $genre->songs
    ]);
});


Route::get('/playlists', function () {
    return view('playlists', [
//        'songs' => Song::all(),
//        'genres' => Genre::all()
        'playlists' => Playlist::all()
    ]);
})->name('playlists');

//Route::get("/songs/add/{song}", [
//    PlaylistController::class, 'store'
//]);

Route::get('/save-list', function() {
    return view('save-list');
})->name('save-list');

Route::post('/save-list', [PlaylistController::class, 'store']);

Route::get('/songs/{songId}', [PlaylistController::class, 'create']);
Route::post('/songs/{songId}', [PlaylistController::class, 'session']);
Route::get('/queuelist/{songId}', [PlaylistController::class, 'create']);
Route::post('/queuelist/delete/{songId}', [PlaylistController::class, 'delete']);

//Route::get('/playlist/{playlistId}', [PlaylistController::class, 'create']);
//Route::post('/playlist/delete/{playlistId}', [PlaylistController::class, 'delete']);

//Route::get('/songs/{id}', [SongController::class, 'create']);
//Route::post('/songs/{id}', [SongController::class, 'store']);

