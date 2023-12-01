@extends('layout')
@section('title','Article')
@section('content')
<h2>{{ $article->title }}</h2>
<article>
    {{ $article->body }}
</article>
<form method="POST" action="{{ route("articles.destroy",$article) }}">
    @csrf
    @method("DELETE")
    <input type="submit" value="Supprimer">
</form>
<a href="{{route("articles.edit",$article)}}">Modifier</a>
<h3>Comments :</h3>
<?php foreach ($comments as $comment): ?>
<p><?=$comment->body?></p>
<?php endforeach; ?>
<?php if($article->archived_at == null): ?>
<h3>Post a new comment</h3>
<form method="POST" action="{{ route("articles.comments.store",["article"=>$article]) }}">
    @csrf
    @include('comments.fields')
</form>
<?php else: ?>
<h3>You cannot post a comment on an archived article!</h3>
<?php endif;?>
@endsection
