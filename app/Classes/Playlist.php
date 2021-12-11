<?php

namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Playlist {
    private $name;
    private $songsList = [];

    public function __construct() {
        if (Session::get('list') != null) {
            $this->name = Session::get('list'[0]);
            $this->songsList = Session::get('list'[1]);
        }
    }

    public function updateSession() {
        Session::put('list', [$this->name, $this->songsList]);
    }
}
