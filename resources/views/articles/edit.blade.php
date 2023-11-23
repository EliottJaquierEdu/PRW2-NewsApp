
<h1>Edit article</h1>
<form method="POST" action="{{ route("articles.update",$article) }}">
    @csrf
    @method("PUT")
    <input type="text" name="title" value="{{ $article->title }}">
    <textarea name="body">{{ $article->body }}</textarea>
    <input type="submit">
</form>
