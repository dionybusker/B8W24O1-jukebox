<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Models\Song;

class SongController extends Controller
{
    public function index() {
        return view('songs', [
            'genres' => Genre::get(),
            'songs' => Song::latest()->filter(
                request(['genre'])
            )->paginate(12)->withQueryString()
        ]);
    }
}
