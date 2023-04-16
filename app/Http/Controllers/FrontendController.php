<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index(){
        $articles = collect($this->getArticle()['articles'])->take(4);

        return view('home', compact('articles'));
    }

    public function blogs(){
        $articles = $this->getArticle();
        return view('blogs', compact('articles'));
    }

    public function planner(){
        return view('planner/index');
    }

    public function createPlan(){
        return view('planner/createPlan');
    }


    //Special Functions
    protected function getArticle(){
        $cacheKey = 'api-response';
        $response = Cache::get($cacheKey);
        if(!$response){
            $response = Http::get('https://newsapi.org/v2/everything?q=tourism&from=2023-03-15&sortBy=publishedAt&apiKey='.env('articleAPIKey'));
            if($response->ok()){
                Cache::put($cacheKey, $response->json(), 60);
            }
        }
        return $response ?? null;
    }

}
