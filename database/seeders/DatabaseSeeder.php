<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // シーダ追加（各テーブルに追加したいデータ）
        $this->call(PokemonSeeder::class);
        $this->call(PartySeeder::class);
    }
}
