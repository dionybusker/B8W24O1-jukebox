<?php

namespace App\Http\Controllers;

use App\Classes\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Song;
use App\Models\SavedList;
use App\Models\SavedListSong;
use App\Http\Controllers\Controller;

class SavedListController extends Controller
{
        public function create()
        {
            return view('songs');
        }

        public function store(Request $request)
        {
            // store into database

            // store into 'saved_lists'
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            $savedList = SavedList::create([
                'user_id' => $request->user()->id,
                'name' => $request->name,
            ]);

            SavedListSong::create([
                // saved_list_id
                'saved_list_id' => $savedList->id,
                // song_id
                'song_id' => $request->session('list')
//                'song_id' => '1'
            ]);

            return redirect('playlists');
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
