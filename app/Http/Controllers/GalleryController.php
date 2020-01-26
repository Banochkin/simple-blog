<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Image;
use App\Tag;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();

        return view('gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'filename' => 'required',
        ]);

        $image = new Image([
            'filename' => $request->get('filename'),
            'description' => $request->get('description'),
        ]);

        $image->save();

        return redirect('/gallery')->with('success', 'Image saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::find($id);

        $tags = Image::find($id)->showTags;

        return view('gallery.show', compact('image', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);

        $tags = Image::find($id)->showTags;

        return view('gallery.edit', compact('image', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image = Image::find($id);

        $image->description = $request->get('description');

        //$imageId = $id;
        $postTags = $request->get('tags');
        $postTagsArr = explode(', ', $postTags);
        $postTagsArr = array_unique($postTagsArr);
        foreach ($postTagsArr as $postTag) {
            if(Tag::where('name', $postTag)->exists()) {

                $tagId = Tag::where('name', $postTag)->first()->id;

                if(!$image->showTags->contains($tagId)) {
                    DB::table('images_tags')->insertGetId([
                        'image_id' => $id,
                        'tag_id' => $tagId,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                      ]);
                }

            } else {
                $tag = new Tag ([
                    'name' => $postTag,
                ]);

                $tag->save();

                $tagId = $tag->id;

                DB::table('images_tags')->insertGetId([
                    'image_id' => $id,
                    'tag_id' => $tagId,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                  ]);
            }
        }

        $image->save();

        return redirect('/gallery')->with('success', 'Image updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        $imagePath = public_path().'/images/'.$image->filename;
        unlink($imagePath);

        $image->delete();

        return redirect('/gallery')->with('success', 'Image deleted!');
    }
}
