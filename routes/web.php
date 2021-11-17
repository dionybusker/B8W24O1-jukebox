<?php

use App\Models\Genre;
use App\Models\Song;
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
    return view('genres', [
        'genres' => Genre::all()
    ]);
});

Route::get('/songs', function () {
    return view('songs', [
        'songs' => Song::with('genre')->get()
    ]);
});

Route::get('genres/{genre}', function (Genre $genre) {
    return view('songs', [
        'songs' => $genre->songs
    ]);
});
