<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parties')->insert([
            'id' => 1,
            'public_code' => 'XL308U',
            'pokemon_id1' => 1,
            'pokemon_id2' => 2,
            'pokemon_id3' => 3,
            'pokemon_id4' => 4,
            'pokemon_id5' => 5,
            'pokemon_id6' => 6
        ]);
        DB::table('parties')->insert([
            'id' => 2,
            'public_code' => NULL,
            'pokemon_id1' => 7,
            'pokemon_id2' => 1,
            'pokemon_id3' => 2,
            'pokemon_id4' => 3,
            'pokemon_id5' => 4,
            'pokemon_id6' => 5
        ]);
    }
}