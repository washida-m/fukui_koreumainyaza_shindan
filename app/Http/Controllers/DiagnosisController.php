<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Item;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DiagnosisController extends Controller
{
    /**
     * 診断フォーム質問①を表示
     */
    public function showQuestion1(): View
    {
        // セッションに残っている回答データをクリア
        session()->forget(['q1_answer', 'q2_answer', 'q3_answer']);

        // ビューに渡すデータを$data配列に格納
        $data = [
            'questionNumber' => 1, // 質問番号
            'questionText' => '質問1<br>今日の目的はどっち？', // 質問内容
            'formAction' => route('diagnosis.process1'), // 質問フォームの送信先
            'inputRadioName' => 'q1', // ラジオボタンのname属性に設定する値
            'options' => [
                'A' => '福井の思い出を持ち帰りたい！',
                'B' => '今すぐ福井を味わいたい！',
            ] // ラジオボタンのvalue属性の値 => 表示ラベル
        ];

        // 共通ビューに$dataを渡す
        return view('diagnosis.question', $data);
    }

    /**
     * 診断フォーム質問②を表示
     */
    public function showQuestion2(): View
    {
        // セッションからデータを取得
        $answer1 = session('q1_answer');

        // セッションに$answer1の値がなければ、質問①にリダイレクト
        if (!$answer1) {
            return redirect()->route('diagnosis.question1');
        }

        // ビューに渡す変数を初期化
        $questionText = '';
        $options = [];

        // $answer1の値に応じて質問内容と選択肢を決定
        if ($answer1 === 'A') { // お土産
            $questionText = '質問2<br>どんな味がいい？';
            $options = [
                'A-1' => '甘いものが好き',
                'A-2' => '甘くない・しょっぱい系がいい',
            ];
        } elseif ($answer1 === 'B') { // グルメ
            $questionText = '質問2<br>どんなスタイルで楽しみたい？';
            $options = [
                'B-1' => 'お店でゆっくり！福井ならではの味をしっかり堪能したい！',
                'B-2' => 'サクッと手軽に！テイクアウトや軽食もOK！',
            ];
        }

        // ビューに渡すデータを$data配列に格納
        $data = [
            'questionNumber' => 2,
            'questionText' => $questionText,
            'formAction' => route('diagnosis.process2'),
            'inputRadioName' => 'q2',
            'options' => $options,
        ];

        // 共通ビューに$dataを渡す
        return view('diagnosis.question', $data);
    }

    /**
     * 診断フォーム質問③を表示
     */
    public function showQuestion3(): View
    {
        // セッションからデータを取得
        $answer2 = session('q2_answer');

        // セッションに$answer2の値がなければ、質問②にリダイレクト
        if (!$answer2) {
            return redirect()->route('diagnosis.question2');
        }

        // ビューに渡す変数を初期化
        $questionText = '';
        $options = [];

        // $answer2の値に応じて質問内容と選択肢を決定
        if ($answer2 === 'A-1') { // 甘いもの
            $questionText = '質問3<br>持ち帰ってすぐに食べたい？<br>それとも日持ちする方がいい？';
            $options = [
                'A-1-1' => 'すぐ食べたい！',
                'A-1-2' => '日持ちする方がいい',
            ];
        } elseif ($answer2 === 'A-2') { // 甘くないもの
            $questionText = '質問3<br>何のお供にしたい？';
            $options = [
                'A-2-1' => 'お酒のあてにしたい',
                'A-2-2' => 'ご飯のおかずにしたい',
            ];
        } elseif ($answer2 === 'B-1') { // しっかり堪能
            $questionText = '質問3<br>何のお供にしたい？';
            $options = [
                'B-1-1' => 'やっぱり福井の海の幸！',
                'B-1-2' => 'いや、地元の人が愛する定番の味！',
            ];
        } elseif ($answer2 === 'B-2') { // 手軽
            $questionText = '質問3<br>体が求めているのはどっち？';
            $options = [
                'B-2-1' => 'しょっぱい系！ ご飯ものか軽食がいい！ ',
                'B-2-2' => 'いや、甘いものでホッとしたい！',
            ];
        } 

        // ビューに渡すデータを$data配列に格納
        $data = [
            'questionNumber' => 3,
            'questionText' => $questionText,
            'formAction' => route('diagnosis.process3'),
            'inputRadioName' => 'q3',
            'options' => $options,
        ];

        // 共通ビューに$dataを渡す
        return view('diagnosis.question', $data);
    }

    /**
     * 質問①の回答を処理し、質問②へリダイレクト
     */
    public function processQuestion1(Request $request): RedirectResponse
    {
        // バリデーション
        $validated = $request->validate([
            'q1' => 'required|string|in:A,B',
        ]);

        // 回答をセッションに保存
        session(['q1_answer' => $validated['q1']]);

        // 質問②へリダイレクト
        return redirect()->route('diagnosis.question2');
    }

    /**
     * 質問②の回答を処理し、質問③へリダイレクト
     */
    public function processQuestion2(Request $request): RedirectResponse
    {
        // バリデーション
        $validated = $request->validate([
            'q2' => 'required|string|in:A-1,A-2,B-1,B-2',
        ]);

        // 回答をセッションに保存
        session(['q2_answer' => $validated['q2']]);

        // 質問③へリダイレクト
        return redirect()->route('diagnosis.question3');
    }

    /**
     * 質問③の回答を処理（最終処理：結果診断）
     */
    public function processQuestion3(Request $request): RedirectResponse
    {
        // バリデーション
        $validated = $request->validate([
            'q3' => 'required|string|in:A-1-1,A-1-2,A-2-1,A-2-2,B-1-1,B-1-2,B-2-1,B-2-2',
        ]);

        // 回答をセッションに保存
        session(['q3_answer' => $validated['q3']]);

        // セッションからデータを取得
        $answer1 = session('q1_answer');
        $answer2 = session('q2_answer');
        $answer3 = session('q3_answer');

        // 回答に不正がないかチェック、値がなければセッションクリアし、質問①にリダイレクト
        if (!$answer1 || !$answer2 || !$answer3) {
            session()->forget(['q1_answer', 'q2_answer', 'q3_answer']);
            return redirect()->route('diagnosis.question1')->with('error', '診断を最初からやり直してください');
        }

        // 診断ロジック
        $candidateItemIds = [];

        if ($answer1 === 'A') {
            if ($answer2 === 'A-1') {
                if ($answer3 === 'A-1-1') { $candidateItemIds = [1, 3]; }
                elseif ($answer3 === 'A-1-2') { $candidateItemIds = [4]; }
                else { $candidateItemIds = []; }
            }elseif ($answer2 === 'A-2') {
                if ($answer3 === 'A-2-1') { $candidateItemIds = [5, 6]; }
                elseif ($answer3 === 'A-2-2') { $candidateItemIds = [7, 8]; }
                else { $candidateItemIds = []; }
            }
        }elseif ($answer1 === 'B') {
            if ($answer2 === 'B-1') {
                if ($answer3 === 'B-1-1') { $candidateItemIds = [11, 15]; }
                elseif ($answer3 === 'B-1-2') { $candidateItemIds = [2, 10, 12, 17]; }
                else { $candidateItemIds = []; }
            }elseif ($answer2 === 'B-2') {
                if ($answer3 === 'B-2-1') { $candidateItemIds = [9, 13, 14]; }
                elseif ($answer3 === 'B-2-2') { $candidateItemIds = [16]; }
                else { $candidateItemIds = []; }
            }
        }

        // 候補アイテムIDの配列からランダムにIDを1つ取得
        $recommendedItemId = null;

        if (!empty($candidateItemIds)) {
            $recommendedItemId = Arr::random($candidateItemIds);
        }

        // セッションに残っている回答データをクリア
        session()->forget(['q1_answer', 'q2_answer', 'q3_answer']);

        // 結果ページへリダイレクト
        if ($recommendedItemId) {
            return redirect()->route('items.show', $recommendedItemId);
        }else {
            return redirect('/')->with('message','あなたにおすすめのものが見つかりませんでした。');
        }
        
    }
}
