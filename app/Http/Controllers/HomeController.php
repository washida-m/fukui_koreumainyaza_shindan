<?php

namespace App\Http\Controllers;

use App\Models\Landscape;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 風景画像データをランダムに2件取得し、ビューに渡す
     */
    public function index()
    {
        $randomLandscapes = Landscape::inRandomOrder()->limit(2)->get();

        return view('welcome', [
            'landscapes' => $randomLandscapes
        ]);
    }
}