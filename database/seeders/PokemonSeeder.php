<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokemons')->insert([
            'id' => 1,
            'name' => 'オーガポン（岩）',
            'ability' => 'がんじょう',
            'item' => 'いしずえのめん',
            'teratype' => 'いわ',
            'nature' => 'ようき',
            'h' => 4,
            'a' => 252,
            'b' => 0,
            'c' => 0,
            'd' => 0,
            's' => 252,
            'move1' => 'ツタこんぼう',
            'move2' => 'ウッドホーン',
            'move3' => 'じゃれつく',
            'move4' => 'でんこうせっか',
            'note' => '最速'
        ]);

        DB::table('pokemons')->insert([
            'id' => 2,
            'name' => 'ハッサム',
            'ability' => 'テックニシャン',
            'item' => 'こだわりハチマキ',
            'teratype' => 'はがね',
            'nature' => 'いじっぱり',
            'h' => 236,
            'a' => 252,
            'b' => 20,
            'c' => 0,
            'd' => 0,
            's' => 0,
            'move1' => 'バレットパンチ',
            'move2' => 'ダブルウィング',
            'move3' => 'はたきおとす',
            'move4' => 'とんぼがえり',
            'note' => NULL
        ]);

        DB::table('pokemons')->insert([
            'id' => 3,
            'name' => 'カイリュー',
            'ability' => 'マルチスケイル',
            'item' => 'ゴツゴツメット',
            'teratype' => 'ノーマル',
            'nature' => 'わんぱく',
            'h' => 244,
            'a' => 0,
            'b' => 156,
            'c' => 0,
            'd' => 0,
            's' => 108,
            'move1' => 'じしん',
            'move2' => 'しんそく',
            'move3' => 'りゅうのまい',
            'move4' => 'はねやすめ',
            'note' => '龍舞1積みで最速ガブ抜き'
        ]);

        DB::table('pokemons')->insert([
            'id' => 4,
            'name' => 'サーフゴー',
            'ability' => 'おうごんのからだ',
            'item' => 'オボンのみ',
            'teratype' => 'みず',
            'nature' => 'ひかえめ',
            'h' => 244,
            'a' => 0,
            'b' => 4,
            'c' => 252,
            'd' => 4,
            's' => 4,
            'move1' => 'シャドーボール',
            'move2' => 'ゴールドラッシュ',
            'move3' => 'じこさいせい',
            'move4' => 'わるだくみ',
            'note' => '道具塩に当たる確率高いなら隠密マントに変更'
        ]);

        DB::table('pokemons')->insert([
            'id' => 5,
            'name' => 'テツノツツミ',
            'ability' => 'クォークチャージ',
            'item' => 'ブースとエナジー',
            'teratype' => 'ゴースト',
            'nature' => 'おくびょう',
            'h' => 4,
            'a' => 0,
            'b' => 0,
            'c' => 252,
            'd' => 0,
            's' => 252,
            'move1' => 'フリーズドライ',
            'move2' => 'ハイドロポンプ',
            'move3' => 'アンコール',
            'move4' => 'みがわり',
            'note' => '最速'
        ]);

        DB::table('pokemons')->insert([
            'id' => 6,
            'name' => 'イーユイ',
            'ability' => 'わざわいのたま',
            'item' => 'こだわりスカーフ',
            'teratype' => 'フェアリー',
            'nature' => 'おくびょう',
            'h' => 4,
            'a' => 0,
            'b' => 0,
            'c' => 252,
            'd' => 0,
            's' => 252,
            'move1' => 'オーバーヒート',
            'move2' => 'かえんほうしゃ',
            'move3' => 'あくのはどう',
            'move4' => 'テラバースト',
            'note' => '最速スカーフ'
        ]);

        DB::table('pokemons')->insert([
            'id' => 7,
            'name' => 'キュウコン（アローラ）',
            'ability' => 'ゆきふらし',
            'item' => 'ひかりのねんど',
            'teratype' => 'みず',
            'nature' => 'おくびょう',
            'h' => 244,
            'a' => 0,
            'b' => 0,
            'c' => 12,
            'd' => 0,
            's' => 252,
            'move1' => 'ふぶき',
            'move2' => 'オーロラベール',
            'move3' => 'アンコール',
            'move4' => 'こおりのつぶて',
            'note' => 'つぶて→ムンフォでもOK'
        ]);

    }
}