<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Mass assignment
    protected $fillable = ["body","article_id"];
}
