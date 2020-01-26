<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function showImagesByTags()
    {
        return $this->belongsToMany('App\Image', 'images_tags');
    }
}
