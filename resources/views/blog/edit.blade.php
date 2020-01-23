@extends('base') 

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit post</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('blog.update', $post->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
                <label for="header">Title:</label>
                <input type="text" class="form-control" name="header" value="{{ $post->header }}"/>
            </div>
  
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="content">{{ $post->content }}</textarea>
            </div>
  
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" name="slug" value="{{ $post->slug }}"/>
            </div>
            <div class="form-group">
                <label for="preview">Preview (id from gallery):</label>
                <input type="text" class="form-control" name="preview" value="{{ $post->preview }}"/>
            </div>
            <div class="form-group">
                <label for="main_image">Image (id from gallery):</label>
                <input type="text" class="form-control" name="main_image" value="{{ $post->main_image }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection