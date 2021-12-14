<?php

namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Playlist {
    // Playlist will be used for sessions AND for saved playlists!

    private $name; // name of the playlist
    private $songs = [];

    // list of songs in corresponding playlist

    // Playlist that is made by a guest, will have a default name

    public function __construct($name, $songs) {
//        dd(Session::get('list')[0]);

        $this->name = $name;
        $this->songs = $songs;
    }

    public function addSong($data) { // add song to session
        // push array into array ($songs)

        if (Session::exists('list')) {
            Session::push('list', $data);
        } else {
            $this->updateSession();
        }

//        $this->updateSession();
    }

    public function updateSession() { // update current session
        // update current session
        Session::put('list', [
            $this->name,
            $this->songs
        ]);
    }


    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getSongs(): array
    {
        return $this->songs;
    }

    /**
     * @param array $songs
     */
    public function setSongs(array $songs): void
    {
        $this->songs = $songs;
    }
}
