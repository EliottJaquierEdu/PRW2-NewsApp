@extends('layout')
@section('title','Edit article')
@section('content')
<h1>Edit article</h1>
<form method="POST" action="{{ route("articles.update",$article) }}">
    @csrf
    @method("PUT")
    @include('articles.fields')
</form>
@endsection
