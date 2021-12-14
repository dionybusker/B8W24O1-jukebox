<?php

namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Playlist {
    private $songsList = [];

    public function __construct()
    {
        if (Session::has('list')) {
            $this->songsList = Session::pull('list');
        } else {
            Session::put('list', []);
        }
    }

    public function addSong($songId)
    {
        array_push($this->songsList, $songId);

        $this->updateSession();
    }

    public function delete($songId)
    {
        $key = array_search($songId, $this->songsList);

        if ($key !== false) {
            unset($this->songsList[$key]);
        }

        $this->updateSession();
    }

    public function updateSession()
    {
        Session::put('list', $this->songsList);
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
