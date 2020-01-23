<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'header' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'preview' => 'required',
            'main_image' => 'required',
        ]);

        $post = new Post([
            'header' => $request->get('header'),
            'content' => $request->get('content'),
            'slug' => $request->get('slug'),
            'preview' => $request->get('preview'),
            'main_image' => $request->get('main_image'),
        ]);

        $post->save();

        return redirect('/blog')->with('success', 'Post saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('blog.edit', compact('post'));
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
        $request->validate([
            'header' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'preview' => 'required',
            'main_image' => 'required',
        ]);

        $post = Post::find($id);

        $post->header = $request->get('header');
        $post->content = $request->get('content');
        $post->slug = $request->get('slug');
        $post->preview = $request->get('preview');
        $post->main_image = $request->get('main_image');

        $post->save();

        return redirect('/blog')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
