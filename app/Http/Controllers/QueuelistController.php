<?php

namespace App\Http\Controllers;

use App\Classes\PlaylistClass;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class QueuelistController extends Controller
{
    public function index() {
        $songs = Song::get();
        $genres = Genre::get();

        return view('queuelist', [
            'songs' => $songs,
            'genres' => $genres
        ]);
    }

    public function delete($songId)
    {
        $playlist = new PlaylistClass();

        $playlist->delete($songId);

        return redirect('queuelist');
    }
}
