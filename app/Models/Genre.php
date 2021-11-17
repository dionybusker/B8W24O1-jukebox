<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * protected $guarded = ['id'];
     *   Everything is fillable except for what you provide to this array.
     *
     * protected $fillable = ['name'];
     *   Everything you provide to this array is fillable.
     *
     * protected $guarded = [];
     *   This is also valid because if you don't want the user to change the id
     *   in the database never provide a generic array that might come from a
     *   form request to your genre create method.
     *   If you don't do that you never have to worry about mass assignment vulnerabilities
     *
     *   source: laracasts.com - episode 22: 3 Ways to Mitigate Mass Assignment Vulnerabilities
     */

    public function songs()
    {
        // A genre has many songs
        return $this->hasMany(Song::class);
    }
}
