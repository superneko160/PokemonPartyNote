<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();  // パーティID
            $table->string('public_code')->nullable();  // 公開用コード
            $table->foreignId('pokemon_id1')->constrained('pokemons');  // ポケモン1匹目
            $table->foreignId('pokemon_id2')->nullable()->constrained('pokemons');  // ポケモン2匹目
            $table->foreignId('pokemon_id3')->nullable()->constrained('pokemons');  // ポケモン3匹目
            $table->foreignId('pokemon_id4')->nullable()->constrained('pokemons');  // ポケモン4匹目
            $table->foreignId('pokemon_id5')->nullable()->constrained('pokemons');  // ポケモン5匹目
            $table->foreignId('pokemon_id6')->nullable()->constrained('pokemons');  // ポケモン6匹目
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
