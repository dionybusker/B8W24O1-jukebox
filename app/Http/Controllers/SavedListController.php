<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Song;
use App\Http\Controllers\Controller;

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
            //
        }

        public function session(Request $request)
        {
//            Session::put('song', $request->all());
//            $data = Song::get()->where('id', $request->id);
            $data = Song::find($request->id);

//            dd($data->name);

//            $sessionSongs = Session::get('song');

//            dd($sessionSongs);

            $song = [
                'songId' => $data->id,
                'name' => $data->name,
                'genre' => $data->genre->name,
                'artist' => $data->artist,
                'duration' => $data->duration
            ];

            if ($request->session()->exists('song')) {
                // Wat er nu gebeurt:
                // De huidige session wordt opgeslagen in $value
                // $value wordt opgehaald en in een nieuwe array $new geplaatst
                // Naast $value wordt ook $song in $new geplaatst
                // $value wordt alleen steeds opnieuw opgeslagen
                // Dus ik moet denk ik een array leegmaken voordat het opnieuw opgeslagen wordt


//                $request->session()->push('song', $song);
//                $request->session()->forget('song');

//                $value = $request->session()->pull('song', 'default'); // array
//
//                $new = [ $value, $song ];
//                dd($new);
                $request->session()->put('song', $song);

//                dd($value);

//                $newSession = [$value, $song];

            } else {
                $request->session()->put('song', $song);
            }

//            dd($request);

//            return $request->session()->all();
            return redirect('songs');
        }
}
