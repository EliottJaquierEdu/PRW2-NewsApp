@extends('layout')
@section('title','New article')
@section('content')
<h1>New article</h1>
<form method="POST" action="{{ route("articles.store") }}">
    @csrf
    @include('articles.fields')
</form>
@endsection
