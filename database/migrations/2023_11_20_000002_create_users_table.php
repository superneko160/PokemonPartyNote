<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // ユーザID
            $table->string('name');  // 名前
            $table->string('email')->unique();  // Eメール
            $table->timestamp('email_verified_at')->nullable();  // 確認用Eメール
            $table->string('password');  // パスワード
            $table->foreignId('party_id1')->nullable()->constrained('parties');  // パーティ1組目ID
            $table->foreignId('party_id2')->nullable()->constrained('parties');  // パーティ2組目ID
            $table->foreignId('party_id3')->nullable()->constrained('parties');  // パーティ3組目ID
            $table->foreignId('party_id4')->nullable()->constrained('parties');  // パーティ4組目ID
            $table->foreignId('party_id5')->nullable()->constrained('parties');  // パーティ5組目ID
            $table->foreignId('party_id6')->nullable()->constrained('parties');  // パーティ6組目ID
            $table->rememberToken();  // セッション記憶用トークン
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
