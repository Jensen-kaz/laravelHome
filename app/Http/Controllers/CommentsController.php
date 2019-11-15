<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentsController extends Controller
{
    public function index() {

        $comments = Comment::all();
//        foreach ($articles as $value) {
//            $buttonNames[] = $value->name;
//        }
        $title = 'Комментарии';

        //$articlesOut = ['articles' => $articles, 'title' => $title];
        return view('comments.index')->withTitle($title)->withComments($comments);
    }

    public function view($id) {
        $article = Comment::find($id);
        return view('articles.view')->withArticle($article);
    }

    public function create() {

        $param = Request::all();
        var_dump($param);

        $user = new User;
        $user->name = Str::random(32, 'alpha');
        $user->email = Str::random(32, 'alpha') . '@mail.ru';
        $user->password = 'qwerty';
        $user->save();

        $comment = new Comment;
        $comment->text = Str::random(32, 'alpha');
        $comment->email = Str::random(32, 'alpha') . '@mail.ru';
        $comment->password = 'qwerty';
        $comment->save();
    }
}
