<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Image;
use App\Tag;
  
class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function imageUpload()
    // {
    //     return view('gallery.create');
    // }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
  
        $imageName = time().'.'.$request->image->extension();
   
        $request->image->move(public_path('images'), $imageName);

        $image = new Image([
            'uuid' => Str::uuid(),
            'filename' => $imageName,
            'description' => $request->get('description'),
        ]);

        $image->save();

        $imageId = $image->id;
        $postTags = $request->get('tags');
        $postTagsArr = explode(', ', $postTags);
        $siteTags = Tag::all();
        foreach ($postTagsArr as $postTag) {
            if(Tag::where('name', $postTag)->exists()) {

                $tagId = Tag::where('name', $postTag)->first()->id;

                DB::table('images_tags')->insertGetId([
                    'image_id' => $imageId,
                    'tag_id' => $tagId,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                  ]);

            } else {
                $tag = new Tag ([
                    'name' => $postTag,
                ]);

                $tag->save();

                $tagId = $tag->id;

                DB::table('images_tags')->insertGetId([
                    'image_id' => $imageId,
                    'tag_id' => $tagId,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                  ]);
            }
        }
   
        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName);

        return redirect('/gallery')->with('success', 'Image saved!');
   
    }
}