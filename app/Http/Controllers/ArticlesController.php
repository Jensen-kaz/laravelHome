<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticlesController extends Controller
{
    public function index() {

        $articles = Article::all();
//        foreach ($articles as $value) {
//            $buttonNames[] = $value->name;
//        }
        $title = 'Статьи';

        //$articlesOut = ['articles' => $articles, 'title' => $title];
        return view('articles.index')->withTitle($title)->withArticles($articles);
    }

    public function view($id) {
        $article = Article::find($id);
      // dump($article->comments[0]->author->name);
        $title = 'Комментарии';
        return view('articles.view')->withArticle($article)->withTitleComment($title);
    }
}


