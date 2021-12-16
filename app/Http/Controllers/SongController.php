<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
//    public function index() {
//        $songs = DB::table('songs')->get();
//        //dd($songs);
//
//
//        $genres = DB::table('genres')->get()->where('id', $songs->genre_id);
//
//        return view('songs', [
//            'songs' => $songs,
//            'genres' => $genres
//        ]);
//    }

//    public function create()
//    {
//        return view('songs');
//    }
//
//    public function store(Request $request)
//    {
//        $request->validate([
//            'genre_id' => ['required', 'int'],
//            'name' => ['required', 'string', 'max:255'],
//            'artist' => ['required', 'string', 'max:255'],
//            'length' => ['required', 'int'],
//        ]);
//
//        Song::create([
//            'genre_id' => $request->genre_id,
//            'name' => $request->name,
//            'artist' => $request->artist,
//            'length' => $request->duration,
//        ]);
//
//        return redirect(RouteServiceProvider::HOME);
//    }
}
