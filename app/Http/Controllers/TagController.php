<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function associate(Request $request, Article $article)
    {
        $requestTag = $request->get("tag");
        if (!$article->tags()->get()->contains($requestTag))
            $article->tags()->attach($requestTag);
        return redirect()->route("articles.show",["article"=>$article]);
    }
}
