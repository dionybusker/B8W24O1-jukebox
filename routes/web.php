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
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists');
Route::get('/playlists/{playlistId}', [PlaylistController::class, 'show'])->name('playlist');

Route::get('genres/{genre}', function (Genre $genre) {
    return view('songs', [
        'songs' => $genre->songs
    ]);
});

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
Route::post('/queuelist/delete/{songId}', [QueuelistController::class, 'delete']);

Route::get('/playlists/create/{playlistId}', [PlaylistController::class, 'create']);
Route::post('/playlists/delete/{playlistId}', [PlaylistController::class, 'delete']);

//Route::get('/songs/{id}', [SongController::class, 'create']);
//Route::post('/songs/{id}', [SongController::class, 'store']);

