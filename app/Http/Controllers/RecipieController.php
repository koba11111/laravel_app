<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RecipieController extends Controller
{
    public function index()
    {
        $client_id = env('RAKUTEN_APPLICATIONID');
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?applicationId=$client_id&categoryType=large";
        $method = "GET";
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);
        $posts = $posts['result']['large'];

        for($i=0; $i<10; $i++){
            $categories[] = $posts[$i];
        }

        return view('recipie.index', compact('categories'));
    }

    public function category()
    {
        $category_id = $_POST['categoryId'];
        $client_id = env('RAKUTEN_APPLICATIONID');
        $url = "https://app.rakuten.co.jp/services/api/Recipe/CategoryList/20170426?applicationId=$client_id&categoryId=$category_id";
        $method = "GET";
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        dd($posts);
        return view('recipie.show', compact('categories_detail'));
    }
}
