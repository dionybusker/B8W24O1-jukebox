<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->delete();

        $json = File::get("database/data/songs.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Song::create(array(
                'genre_id' => $obj->genre_id,
                'name' => $obj->name,
                'artist' => $obj->artist,
                'length' => $obj->length
            ));
        }
    }
}
