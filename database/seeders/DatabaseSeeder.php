<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
//        Song::factory(3)->create();
//        Genre::factory()->create();

        $this->call([
            GenreSeeder::class,
            SongSeeder::class
        ]);
    }
}
