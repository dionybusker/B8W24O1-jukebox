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

            $song = [
                'songId' => $request->id,
                'genreId' => $request->genre_id,
                'title' => $request->name,
                'artist' => $request->artist,
                'duration' => $request->duration
            ];

            $session = new Playlist('temp', ['song 1', 'song 2', 'song 3']);
            $session->add($session);

            return redirect('songs');
        }
}
