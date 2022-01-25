<?php

namespace App\Http\Controllers;

use App\Classes\PlaylistClass;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

        $count = $this->countSongs();

        return view('playlists', [
            //'songs' => $songs,
            //'genres' => $genres,
            'playlists' => $playlists,
            'count' => $count,
        ]);
    }

    public function show($playlistId) {
        $playlist = Playlist::where('id', $playlistId)->with('playlistSong.song')->get();
        $totalDuration = $this->calculateDuration($playlistId);

        return view('playlist', [
            'playlist' => $playlist,
            'totalDuration' => $totalDuration
        ]);
    }

    public function create()
    {
        return view('songs');
    }

    public function saveList() {
        $userId = Auth::user()->id;
        $playlists = Playlist::where('user_id', $userId)->get();

        return view('save-list', [
            'playlists' => $playlists
        ]);
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

    public function addSongsToList ($playlist) {
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
    }

    public function addSongsToPlaylist ($playlistId, $songId) {
        PlaylistSong::create([
            'playlist_id' => $playlistId,
            'song_id' => $songId
        ]);

        return redirect('playlists/' . $playlistId);
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

    public function countSongs() {
        $data = PlaylistSong::groupBy('playlist_id')
            ->selectRaw('count(*) as total, playlist_id')
            ->get();

        return $data;
    }

    public function calculateDuration($playlistId)
    {
        $newData = [];
        $length = 0;

        $playlistSongs = PlaylistSong::where('playlist_id', $playlistId)->get();

        foreach ($playlistSongs as $playlistSong) {
            $playlistSongId = $playlistSong->playlist_id;

            $songs = Song::where('id', $playlistSong->song_id)->get();

            foreach ($songs as $song) {
                $length += $this->timeToSeconds($song->length);
            }
            $newData = [
                'data' => $playlistSongId,
                'length' => $length
            ];
        }
        $newData['length'] = $this->secondsToTime($newData['length']);

        return $newData;
    }

    public function timeToSeconds($time) {
        $parts = explode(':', $time);

        return $parts[0]*60 + $parts[1];
    }

    public function secondsToTime($seconds) {
        $minutes = floor($seconds / 60);
        $seconds = ($seconds % 60);

        return sprintf('%02d:%02d', $minutes, $seconds);
    }
}
