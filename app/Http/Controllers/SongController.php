<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Models\Song;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    public function index() {
//        $songs = Song::with('genre')->paginate(12);

        return view('songs', [
            'genres' => Genre::get(),
            'songs' => Song::latest()->filter(
                request(['genre'])
            )->paginate(12)->withQueryString()
        ]);
    }

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
