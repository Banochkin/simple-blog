<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Image;
use App\Tag;

class JsonController extends Controller
{
    public function getPosts()
    {
        $posts = Post::all();
        return $posts;
    }

    public function getImages()
    {
        $images = Image::all();
        return $images;
    }
    public function getImagesTag($id)
    {
        $images = Tag::find($id)->showImagesByTags;
        return $images;
    }
}
