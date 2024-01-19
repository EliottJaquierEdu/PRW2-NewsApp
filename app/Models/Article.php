<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    //Mass assignment
    protected $fillable = ["title", "body", "published_at", "archived_at"];

    /**
     * Get the comments for the blog post.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,"article_id");
    }

    /**
     * Get the comments for the blog post.
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeUnarchived(Builder $query)
    {
        $query->whereNull('archived_at');
    }

    public function scopeArchived(Builder $query)
    {
        $query->whereNotNull('archived_at');
    }

    public function scopeSearch(Builder $query,string $column,string $content)
    {
        $query->where($column,"LIKE","%$content%");
    }

    public function scopeOrderByCreationDate(Builder $query)
    {
        $query->orderBy('created_at', "DESC");
    }

    public function archive()
    {
        //$this->archived_at = now();
        //$this->save();
        $this->timestamps = false;
        $this->update(['archived_at' => now()]);
        $this->timestamps = true;
    }
}
