<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function genre()
    {
        // Eloquent relationships
        //hasOne, hasMany, belongsTo, belongsToMany

        // does a song belongsTo a genre?
        return $this->belongsTo(Genre::class);
    }
}
