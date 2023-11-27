<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Mass assignment
    protected $fillable = ["title","body","published_at","archived_at"];

    public static function unarchived()
    {
        return self::whereNull('archived_at')->get();
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
