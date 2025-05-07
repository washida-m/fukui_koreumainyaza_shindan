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
        Schema::table('landscapes', function (Blueprint $table) {
            $descriptions = [
                7 => '福井駅改札口横のステンドグラス',
                8 => '福井駅改札口横のステンドグラス',
                9 => '福井駅改札口横のステンドグラス',
                10 => '福井駅福井市観光交流センター屋上広場',
                11 => '福井駅福井市観光交流センター屋上広場',
                12 => '福井駅福井市観光交流センター屋上広場',
                13 => '福井駅福井市観光交流センター屋上広場',
                14 => '福井駅福井市観光交流センター屋上広場',
            ];

            foreach ($descriptions as $id => $description) {
                DB::table('landscapes')
                  ->where('id', $id)
                  ->update(['description' => $description]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('landscapes', function (Blueprint $table) {
            //
        });
    }
};
