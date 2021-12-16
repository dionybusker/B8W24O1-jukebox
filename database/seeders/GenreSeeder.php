<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        $json = File::get("database/data/genres.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Genre::create(array(
                'name' => $obj->name
            ));
        }
    }
}
