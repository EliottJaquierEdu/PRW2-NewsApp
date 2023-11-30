<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Mass assignment
    protected $fillable = ["title", "body", "published_at", "archived_at"];

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

    public function archive()
    {
        //$this->archived_at = now();
        //$this->save();
        $this->timestamps = false;
        $this->update(['archived_at' => now()]);
        $this->timestamps = true;
    }
}
