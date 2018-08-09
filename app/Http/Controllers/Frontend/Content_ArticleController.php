<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Content_ArticleController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
    	$id = $request->id;
    	$article =  Article::find($id);
        return view('frontend.content_article.index',['article'=>$article]);
    }

    public function image(Request $request)
    {
    	$id = $request->id;
    	$article =  Article::find($id);
        $articles = json_decode($article['description']);
        $conten = array();
        foreach ($articles as $key => $value) {
            $conten[$key] = $value;
        }
        
        return view('frontend.content_article.image',['article'=>$conten]);
    }

}
