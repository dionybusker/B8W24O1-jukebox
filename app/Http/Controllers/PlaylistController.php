<?php

namespace App\Http\Controllers;

use App\Classes\PlaylistClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
        public function create()
        {
            return view('songs');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            $playlist = Playlist::create([
                'user_id' => $request->user()->id,
                'name' => $request->name,
            ]);

            $list = Session::pull('list');
            $songs = Song::get();

            foreach ($songs as $song) {
                $key = array_search($song->id, $list);

                if ($key !== false) {
                    $listSong = $list[$key];

                    PlaylistSong::create([
                        'playlist_id' => $playlist->id,
                        'song_id' => $listSong,
                    ]);
                }
            }

            return redirect('playlists');
        }

        public function session($songId)
        {
            $playlist = new PlaylistClass();
            $playlist->addSong($songId);

            return redirect('songs');
        }

        public function delete($songId)
        {
            $playlist = new PlaylistClass();

            $playlist->delete($songId);

            return redirect('queuelist');
        }
}
