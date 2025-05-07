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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });

        // 認証機能を実装していないので、コメントアウト
        // // item_idの組み合わせの重複を許さない
        // $table->unique(['item_id']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
