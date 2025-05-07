<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Landscape;

class LandscapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Landscape::create([
            'file_path' => 'images/images_landscapes/echizen_tetsudo_1.jpeg',
            'description' => 'えちぜん鉄道のki-bo',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/echizen_tetsudo_2.jpeg',
            'description' => 'えちぜん鉄道',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_1.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_2.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_1.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_2.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_3.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_4.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_5.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_6.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_7.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_8.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_9.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_10.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_eki_kyoryu_11.jpeg',
            'description' => '福井駅西口広場（恐竜広場）',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_fukei.jpeg',
            'description' => '福井田園風景',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/fukui_tetsudo_1.jpeg',
            'description' => '福井鉄道',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/mikuni_minatoeki_1.jpeg',
            'description' => '三国港駅の眼鏡橋',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/nishiyama_kouen_1.jpeg',
            'description' => '西山公園のレッサーパンダ',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/nishiyama_kouen_2.jpeg',
            'description' => '西山公園のつつじまつり',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/nishiyama_kouen_3.jpeg',
            'description' => '西山公園のつつじまつり',
        ]);

        Landscape::create([
            'file_path' => 'images/images_landscapes/oshima_1.jpeg',
            'description' => '三国の雄島',
        ]);
    }
}
