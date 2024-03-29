<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = request()->has("archived") ? Article::archived() : Article::unarchived();
        if(request()->has("search")){
            $articles->search("title",request()->get("search"));
        }
        $articles->orderByCreationDate();
        return view("articles.index",["articles"=>$articles->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("articles.create",["article"=>new Article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //TODO : Comment error handling
        $comment = new Comment();
        $comments = $article->comments()->get();
        $tags = $article->tags()->get();
        $allTags = Tag::all();
        return view("articles.show",compact("article","comment","comments","tags","allTags"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view("articles.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route("articles.show",$article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //$article->delete();
        $article->archive();
        return redirect()->route("articles.index");
    }
}
