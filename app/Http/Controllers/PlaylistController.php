<?php

namespace App\Http\Controllers;

use App\Classes\PlaylistClass;
use App\Models\Genre;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;
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

        $count = $this->countSongs();
//        $this->calculateDuration();
//        $totalDuration = 0;

//        foreach ($playlists as $playlist) {
//            dd($playlist);
            $totalDuration = $this->calculateDuration();
//        }

//        dd($totalDuration);

        return view('playlists', [
            //'songs' => $songs,
            //'genres' => $genres,
            'playlists' => $playlists,
            'count' => $count,
            'totalDuration' => $totalDuration
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
            'name' => ['required_without:list'],
            'list' => ['required_without:name']
        ]);

        if ($request->name != null) {
            $playlist = Playlist::create([
                'user_id' => $request->user()->id,
                'name' => $request->name,
            ]);

            $this->addSongsToList($playlist);
        }

        if ($request->list != "None") {
            $playlist = Playlist::find($request->list);

            $this->addSongsToList($playlist);
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

    public function calculateDuration()
    {
        $newData = [];
        $plid = '';

        $data = PlaylistSong::groupBy('playlist_id')
            ->selectRaw('count(id) as total, playlist_id')
            ->get();

//        dd($data);
//        dd($playlist);
//        foreach ($playlist as $pl) {
//            dd($playlist);

//        foreach ($data as $d) {
//            dd($d);
            $length = 0;
//            dd($data);

            $playlistSongs = PlaylistSong::where('playlist_id', $data[3]->playlist_id)->get();

            foreach ($playlistSongs as $playlistSong) {
                $plid = $playlistSong->playlist_id;

//                dd($playlistSong->playlist_id);
                $songs = Song::where('id', $playlistSong->song_id)->get();

                foreach ($songs as $song) {
                    $length += $this->timeToSeconds($song->length);

                }
                $newData = [
                    'data' => $plid,
                    'length' => $length
                ];
//                dd($newData);
            }

            dd($newData);
            return $newData;
//        }
//        dd($newData);


    }


    public function timeToSeconds($time) {
        $parts = explode(':', $time);

//        dd($parts[0]*60 + $parts[1]);

        return $parts[0]*60 + $parts[1];
    }

    public function secondsToTime($seconds) {
        $minutes = floor($seconds / 60);
//        dd($minutes);

        $seconds = ($seconds % 60);

        return sprintf('%02d:%02d', $minutes, $seconds);
    }


}
