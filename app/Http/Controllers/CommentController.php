<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        if($article->archived_at != null) throw new \HttpException("You cannot post a comment on an archived article!");
        Comment::create([
            'body'=>$request->get('body'),
            'article_id'=>$article->id,
        ]);
        return redirect()->route("articles.show",["article"=>$article->id]);
    }
}
