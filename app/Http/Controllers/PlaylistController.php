<?php

namespace App\Http\Controllers;

use App\Classes\PlaylistClass;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
    public function index() {
        $userId = Auth::user()->id;

//        $songs = Song::get();
//        $genres = Genre::get();
        $playlists = Playlist::where('user_id', $userId)->get();

//        dd($playlists);

//        foreach ($playlists as $pl) {
//            $count = $pl->id;
//        }

        $count = $this->countSongs($playlists);

//        dd($count);

        return view('playlists', [
            //'songs' => $songs,
            //'genres' => $genres,
            'playlists' => $playlists
        ]);
    }

    public function show($playlistId) {
        $playlist = Playlist::where('id', $playlistId)->with('playlistSong.song')->get();

        return view('playlist', [
            'playlist' => $playlist
        ]);
    }

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

    public function edit(Playlist $playlist) {
        return view('edit', ['playlist' => $playlist]);
    }

    public function update(Playlist $playlist) {
        $attributes = request()->validate([
            'name' => 'required'
        ]);

        $playlist->update($attributes);

//        $pl = $request->all();

//        Playlist::find($playlist->id)->update($pl);

        return redirect('playlists/' . $playlist->id);
    }

    public function session($songId)
    {
        $playlist = new PlaylistClass();
        $playlist->addSong($songId);

        return redirect('songs');
    }

    public function delete($playlistId)
    {
        $playlist = Playlist::find($playlistId);
        $playlistSongs = PlaylistSong::where('playlist_id', $playlistId)->get();

        foreach ($playlistSongs as $playlistSong) {
            if ($playlistSong->playlist_id == $playlistId) {
                $playlistSong->delete($playlistId);
            }
        }

        $playlist->delete($playlistId);

        return redirect('playlists');
    }

    public function deleteSongFromPlaylist($playlistId, $songId) {
        $playlistSongs = PlaylistSong::where('playlist_id', $playlistId)->get();

        foreach ($playlistSongs as $playlistSong) {
            if ($playlistSong->playlist_id == $playlistId && $playlistSong->song_id == $songId) {
                $playlistSong->delete($songId);
            }
        }

        return redirect('playlists/' . $playlistId);
    }

    public function countSongs($playlists) {
//        dd($playlists);

//        $songs = Song::get();

        foreach ($playlists as $playlist) {
            $pl = Playlist::find($playlist->id);
            $plSongs = PlaylistSong::where('playlist_id', $pl->id)->get();

//            foreach ($plSongs as $plSong) {
//                $songs = Song::where('id', $plSong->id)->get();
//                dd($songs);
//            }



        }

//        $playlist = Playlist::find($playlistId);

//        return Playlist::find($playlistId);
    }
}
