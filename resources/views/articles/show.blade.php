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
<h3>Tags :</h3>
@include('tags.list')
<h4>Add a new tag</h4>
<form method="POST" action="{{ route("articles.tags.associate",["article"=>$article]) }}">
    @csrf
    <label>
        Tag to add
        <select name="tag">
            @foreach($allTags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </label>
    <input type="submit">
</form>
<h3>Comments :</h3>
@foreach($comments as $comment)
<p>{{ $comment->body  }}</p>
@endforeach
@if($article->archived_at == null)
<h4>Post a new comment</h4>
<form method="POST" action="{{ route("articles.comments.store",["article"=>$article]) }}">
    @csrf
    @include('comments.fields')
</form>
@else
<h3>You cannot post a comment on an archived article!</h3>
@endif
@endsection
