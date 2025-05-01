<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => '羽二重餅',
            'category' => '土産',
            'description' => '福井の定番土産やざ！絹のような滑らかな舌触りがたまらんのぉ。',
            'image_path' => 'images/habutae.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => '羽二重餅 福井',
        ]);

        Item::create([
            'name' => 'ソースカツ丼',
            'category' => 'グルメ',
            'description' => '福井県民のソウルフード！甘めのソースがカツとご飯に絡んで、もう最高やざ！',
            'image_path' => 'images/sauce_katsudon.jpg',
            'rakuten_keyword' => 'ソースカツ丼 福井',
        ]);
        
        Item::create([
            'name' => '水ようかん',
            'category' => '土産',
            'description' => '福井の冬の風物詩！福井は冬にこたつで冷たい水ようかん食べるんやで！',
            'image_path' => 'images/mizu_yokan.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => '水ようかん 福井',
        ]);

        Item::create([
            'name' => '五月ヶ瀬 (さつきがせ)',
            'category' => '土産',
            'description' => '福井を代表する銘菓！ピーナッツが入った硬めの煎餅で、このガリッとした歯ごたえと香ばしさがたまらんのぉ。',
            'image_path' => 'images/satsukigase.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => '五月ヶ瀬 福井',
        ]);

        Item::create([
            'name' => '小鯛の笹漬け',
            'category' => '土産',
            'description' => '若狭地方の伝統的なお土産！笹の香りがふわっとして、お酒のあてにも、ご飯のお供にもええんやわ。',
            'image_path' => 'images/sasazuke.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => '小鯛の笹漬け 福井',
        ]);

        Item::create([
            'name' => 'へしこ',
            'category' => '土産',
            'description' => '鯖を糠漬けにした、若狭地方の保存食！独特の風味と塩気があるけど、これがまたお茶漬けとか、酒の肴に最高なんや！',
            'image_path' => 'images/heshiko.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => 'へしこ 福井',
        ]);

        Item::create([
            'name' => '花らっきょう',
            'category' => '土産',
            'description' => '坂井市の三里浜で作られる、小粒でシャキシャキした歯ごたえが特徴のらっきょうやざ。カレーのお供はもちろん、お酒のアテにもええんやわ。',
            'image_path' => 'images/hana_rakkyo.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => '花らっきょう 福井',
        ]);

        Item::create([
            'name' => 'たくあんの煮たの',
            'category' => '土産',
            'description' => '昔から親しまれている郷土料理！古くなったたくあんを醤油の味付けで柔らかく煮込んだもので、ご飯のおかずや酒の肴として人気があるんや！',
            'image_path' => 'images/takuan_nitano.jpg', // storage/app/public/images に置く
            'rakuten_keyword' => 'たくあんの煮たの 福井',
        ]);

        Item::create([
            'name' => '焼き鯖寿司',
            'category' => 'グルメ',
            'description' => '香ばしく焼いた鯖と酢飯の組み合わせが絶妙やざ！福井の空弁としても人気やし、一本ペロリと食べてまうんやわ〜！',
            'image_path' => 'images/yakisaba_sushi.jpg',
            'rakuten_keyword' => 'ソースカツ丼 福井',
        ]);

        Item::create([
            'name' => '越前おろしそば',
            'category' => 'グルメ',
            'description' => '福井で『そば』といったらやっぱこれ！冷たいそばにたっぷりの大根おろしと鰹節、ネギを乗せて、だしをぶっかけて食べるんやざ。',
            'image_path' => 'images/oroshi_soba.jpg',
            'rakuten_keyword' => '越前そば おろしそば 福井',
        ]);

        Item::create([
            'name' => '越前がに',
            'category' => 'グルメ',
            'description' => '黄色いタグが目印のブランド蟹！冬には福井県最大のカニの祭典『越前かにまつり』もやってるんやで！',
            'image_path' => 'images/echizen_gani.jpg',
            'rakuten_keyword' => '越前がに 福井',
        ]);

        Item::create([
            'name' => 'ボルガライス',
            'category' => 'グルメ',
            'description' => '越前市のご当地グルメ！オムライスの上にトンカツが乗って、さらにデミグラスソースやトマトソースがかかってる、ボリューム満点の一品やで！',
            'image_path' => 'images/volga_rice.jpg',
            'rakuten_keyword' => 'ボルガライス レトルト',
        ]);

        Item::create([
            'name' => '谷口屋の油揚げ',
            'category' => 'グルメ',
            'description' => '坂井市丸岡町竹田にある『谷口屋』さんの油揚げは、ぶっとくてでっかいんや！外はカリッ、中はふんわりジューシー！',
            'image_path' => 'images/volga_rice.jpg',
            'rakuten_keyword' => '谷口屋 油揚げ 福井',
        ]);

        Item::create([
            'name' => 'サバエドッグ',
            'category' => 'グルメ',
            'description' => '鯖江市のB級グルメ!肉巻きおにぎりをフライにしてソースをたっぷりつけたもので、“歩きながら食べれるソースかつ丼”。',
            'image_path' => 'images/sabae_dog.jpg',
            'rakuten_keyword' => 'サバエドッグ 福井',
        ]);

        Item::create([
            'name' => 'せいこがに',
            'category' => 'グルメ',
            'description' => '越前がにのメスのことやざ。お腹に抱えとるプチプチの『外子』と、甲羅ん中にある濃厚なオレンジ色の『内子』が絶品なんや！味噌も美味しくて、地元ではオスよりこっちが好きやって人も結構おるんやわ。',
            'image_path' => 'images/seiko_gani.jpg',
            'rakuten_keyword' => 'せいこがに 越前 福井',
        ]);

        Item::create([
            'name' => 'あべかわ餅',
            'category' => 'グルメ',
            'description' => '黒蜜を絡めた餅に、きな粉をたっぷりまぶして食べるソウルフード！素朴で自然な甘さが、口の中いっぱいに広がるのがたまらんわ〜！',
            'image_path' => 'images/abekawa_fukui.jpg',
            'rakuten_keyword' => 'あべかわ餅 福井',
        ]);

        Item::create([
            'name' => '秋吉 (やきとりの名門 秋吉)',
            'category' => 'グルメ',
            'description' => '福井県民が愛してやまない、やきとりの超有名チェーン店やざ！ついつい何十本も食べちゃうんやわ。福井に来たら絶対寄ってほしいお店の一つ！',
            'image_path' => 'images/akiyoshi.jpg',
            'rakuten_keyword' => '秋吉 焼き鳥 通販',
        ]);
    }
}
