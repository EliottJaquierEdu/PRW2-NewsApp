<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function associate(Request $request, Article $article)
    {
        $requestTag = $request->get("tag");
        if (!$article->tags()->get()->contains($requestTag))
            $article->tags()->attach($requestTag);
        return redirect()->route("articles.show",["article"=>$article]);
    }

    public function dissociate(Request $request, Article $article, Tag $tag)
    {
        $article->tags()->detach($tag);
        return redirect()->route("articles.show",["article"=>$article]);
    }
}
