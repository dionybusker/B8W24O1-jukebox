<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedListSong extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function savedList()
    {
        return $this->belongsTo(SavedList::class);
    }

    public function song()
    {
        return $this->hasMany(Song::class);
    }
}
