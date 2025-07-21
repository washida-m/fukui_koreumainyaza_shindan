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
            
            // どのユーザーがお気に入りしたか
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // どのアイテムがお気に入りされたか
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();

            // 同じユーザーが同じアイテムを複数お気に入りできないようにする
            $table->unique(['user_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
