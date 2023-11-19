<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();  // ポケモンID
            $table->string('name');  // 名前
            $table->string('ability');  // 特性
            $table->string('item')->nullable();  // 持ち物
            $table->string('teratype');  // テラスタイプ
            $table->string('nature');  // 性格
            $table->integer('h');  // H
            $table->integer('a');  // A
            $table->integer('b');  // B
            $table->integer('c');  // C
            $table->integer('d');  // D
            $table->integer('s');  // S
            $table->string('move1')->nullable();  // 技1
            $table->string('move2')->nullable();  // 技2
            $table->string('move3')->nullable();  // 技3
            $table->string('move4')->nullable();  // 技4
            $table->text('note')->nullable();  // 備考
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
