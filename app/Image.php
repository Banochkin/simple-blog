<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function showTags()
    {
        return $this->hasMany('App\Tag');
    }
}
