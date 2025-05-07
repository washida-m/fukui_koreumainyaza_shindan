<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DBファサードをインポート

class ItemImagePathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Updating image_path in items table...');

        // itemsテーブルの全行に対して更新を実行
        $updatedCount = DB::table('items')
            // 'images/' で始まる行のみを対象にする
            ->where('image_path', 'like', 'images/%')
            // 'image_path' カラムの値を更新
            ->update([
                // REPLACE(元のカラム, '置き換えたい文字列', '置き換え後の文字列')
                'image_path' => DB::raw("REPLACE(image_path, 'images/', 'images/images_items/')")
            ]);

        $this->command->info("Finished updating image_path. {$updatedCount} rows affected.");
    }
}