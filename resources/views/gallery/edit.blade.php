@extends('base') 

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit image</h1>

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
        <form method="post" action="{{ route('gallery.update', $image->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description">{{ $image->description }}</textarea>
            </div>
  
            <div class="form-group">
                <label for="tags">Tags:</label>
                <input type="text" class="form-control" name="tags" value="@foreach ($tags as $tag)
{{$tag->name}}@if (!$loop->last), @endif
@endforeach"/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection