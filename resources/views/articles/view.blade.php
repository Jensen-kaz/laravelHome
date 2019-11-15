@extends('layouts/app')

@section('content')
<div class="article-content">
    <div class="inner">
        {!! $article->text !!}
    </div>
</div>
<div class="comments">
    <h2>{{$titleComment}}</h2>
    @foreach($article->comments as $comment)
        <div class="comment-body">
            <div class="comment-author">

                {{$comment->author->name}}
            </div>
            <div class="comment-text">
                {{$comment->text}}
            </div>
        </div>
    @endforeach
<!--    --><?//
//    echo Form::open('comments/create', 'POST');
//
//    echo Form::label('commentText', 'Комментарий') . Form::text('commentText', Input::old('commentText'));
//    echo Form::submit('Оставить комментарий');
//    ?>
    <form method="POST" action="{{route('comment-add')}}">
        {{csrf_field()}}
        <input id="commentText" type="text" name="commentText">
        <button type="submit">
            Оставить комментарий
        </button>

    </form>
</div>
@endsection
