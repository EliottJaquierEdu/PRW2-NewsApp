<h2>{{ $article->title }}</h2>
<article>
    {{ $article->body }}
</article>
<form method="POST" action="{{ route("articles.destroy",$article) }}">
    @csrf
    @method("DELETE")
    <input type="submit" value="Supprimer">
</form>
