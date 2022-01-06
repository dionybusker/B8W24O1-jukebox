<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['genre']; // prevent N+1 problem

    public function scopeFilter($query, array $filters) {
        $query->when($filters['genre'] ?? false, function ($query, $genre) {
            $query->whereHas('genre', function($query) use ($genre) {
                $query->where('name', $genre);
            });
        });
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function playlistSong()
    {
        return $this->hasMany(PlaylistSong::class);
    }
}
