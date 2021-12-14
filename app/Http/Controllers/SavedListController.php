<?php

namespace App\Http\Controllers;

use App\Classes\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Song;
use App\Http\Controllers\Controller;
//use App\Classes\Playlist;

class SavedListController extends Controller
{
//    public function store(Request $request)
//    {
//        Session::put('song', $request->all());
//
//        return $request->session()->all();
//    }


        public function create()
        {
            return view('songs');
        }


        public function store()
        {
            // store into database
        }

        public function session(Request $request)
        {
            // store into a session

//            $data = Song::get()->where('id', $request->id);
            $data = Song::find($request->id);

//            $songId = $data->id;

//            dd($data->genre->name);
            $song = [
                'song_id' => $data->id,
                'genre_id' => $data->genre_id,
                'name' => $data->name,
                'artist' => $data->artist,
                'duration' => $data->duration
            ];

//            if (!$request->session()->exists('list')) {
                $session = new Playlist('temp', $song);
                $session->addSong($song);
//            }

            return redirect('songs');
        }

        public function delete (Request $request) {
//            $data = Song::find($request->id);

//            $song = Session::get('list');

//            $request->session()->forget($data);

//            dd($song);

//            $session = Session::get('list');
//            $session->delete($session);
        }
}
