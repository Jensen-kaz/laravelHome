<?php

namespace App\Http\Controllers;

use App\Events\SendEmail;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CommentsController extends Controller
{
    public function index() {

        $comments = Comment::all();
        $title = 'Комментарии';

        return view('comments.index')->withTitle($title)->withComments($comments);
    }

    public function view($id) {
        $article = Comment::find($id);
        return view('articles.view')->withArticle($article);
    }

    public function create(Request $request) {

        $param = $request->all();
            $user = Auth::user();
            $comment = new Comment;
            $comment->text = $param['commentText'];
            $comment->article_id = $param['articleId'];
            $comment->user_id = $user->id;
            $comment->save();

            event(new SendEmail($comment));

        return redirect(url('articles/view', ['id' => $param['articleId']]));
    }
}
