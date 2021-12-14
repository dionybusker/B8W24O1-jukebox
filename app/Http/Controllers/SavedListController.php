<?php

namespace App\Http\Controllers;

use App\Classes\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Song;
use App\Http\Controllers\Controller;

class SavedListController extends Controller
{
        public function create()
        {
            return view('songs');
        }

        public function store()
        {
            // store into database
        }

        public function session($songId)
        {
            $playlist = new Playlist();
            $playlist->addSong($songId);

            return redirect('songs');
        }

        public function delete($songId)
        {
            $playlist = new Playlist();

            $playlist->delete($songId);

            return redirect('queuelist');
        }
}
