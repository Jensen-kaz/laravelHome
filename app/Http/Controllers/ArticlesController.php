<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    public function index() {

        $articles = Article::all();
//        foreach ($articles as $value) {
//            $buttonNames[] = $value->name;
//        }
        $title = 'Статьи';
        $authUser = Auth::user();
        return view('articles.index')->withTitle($title)->withArticles($articles)->withCurrentUser($authUser);
    }

    public function view($id) {
        $article = Article::find($id);
        $authUser = Auth::user();
        $title = 'Комментарии';
        return view('articles.view')->withArticle($article)->withTitleComment($title)->withCurrentUser($authUser);
    }
}


