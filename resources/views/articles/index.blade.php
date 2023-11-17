<h1>Les articles</h1>
<ul>
    @foreach($articles as $article)
        <li><a href="{{route("articles.show",$article)}}}">{{ $article->title }}</a></li>
    @endforeach
</ul>
