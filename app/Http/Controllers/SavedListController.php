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
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            $savedList = SavedList::create([
                'user_id' => $request->user()->id,
                'name' => $request->name,
            ]);

            $list = Session::pull('list');
            $songs = Song::get();

            foreach ($songs as $song) {
                $key = array_search($song->id, $list);

                if ($key !== false) {
                    $listSong = $list[$key];

                    SavedListSong::create([
                        'saved_list_id' => $savedList->id,
                        'song_id' => $listSong,
                    ]);
                }
            }

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
