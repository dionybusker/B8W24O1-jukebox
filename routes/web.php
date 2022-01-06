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

Route::get('/', [SongController::class, 'index'])->name('home');

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

Route::get('/save-list', [PlaylistController::class, 'saveList'])->name('save-list');
Route::post('/save-list', [PlaylistController::class, 'store']);


//Route::get('genres/{genre', function)

Route::get('/songs/{songId}', [PlaylistController::class, 'create']);
Route::post('/songs/{songId}', [PlaylistController::class, 'session']);
Route::get('/queuelist/{songId}', [PlaylistController::class, 'create']);
Route::post('/queuelist/delete/{songId}', [QueuelistController::class, 'delete']);

Route::get('/playlists/create/{playlistId}', [PlaylistController::class, 'create']);
Route::post('/playlists/delete/{playlistId}', [PlaylistController::class, 'delete']);
Route::post('/playlists/deleteSongFromPlaylist/{playlistId}/{songId}', [PlaylistController::class, 'deleteSongFromPlaylist']);

//Route::get('/update-list/{playlistId}', function() {
//    return view('update-list');
//})->name('update-list');

//Route::post('/update-list/{playlistId}', [PlaylistController::class, 'update']);

Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit']);
Route::post('/playlists/{playlist}/edit', [PlaylistController::class, 'update']);

//Route::get('/songs/{id}', [SongController::class, 'create']);
//Route::post('/songs/{id}', [SongController::class, 'store']);

