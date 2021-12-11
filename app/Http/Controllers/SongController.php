<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class SongController extends Controller
{
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
//            'duration' => ['required', 'int'],
//        ]);
//
//        Song::create([
//            'genre_id' => $request->genre_id,
//            'name' => $request->name,
//            'artist' => $request->artist,
//            'duration' => $request->duration,
//        ]);
//
//        return redirect(RouteServiceProvider::HOME);
//    }
}
