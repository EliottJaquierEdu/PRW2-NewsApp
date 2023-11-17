<h1>Les articles</h1>
<ul>
    @foreach($articles as $article)
        <li> {{ $article->title }}</li>
    @endforeach
</ul>
