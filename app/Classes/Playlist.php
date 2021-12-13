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
        $this->name = $name;
        $this->songs = $songs;
    }

    public function add($data) {
        // push array into array ($songs)
//        dd($this->songs);
        Session::push('list', $data);

//        $this->update();
    }

    public function update() {
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
