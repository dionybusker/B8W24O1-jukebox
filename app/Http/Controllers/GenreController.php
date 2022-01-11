<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::latest()->paginate(50);

        return view('genres', [
            'genres' => $genres
        ]);
    }
}
