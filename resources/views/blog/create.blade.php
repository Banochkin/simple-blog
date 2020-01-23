@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add post</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('blog.store') }}">
          @csrf
          <div class="form-group">    
              <label for="header">Title:</label>
              <input type="text" class="form-control" name="header"/>
          </div>

          <div class="form-group">
              <label for="content">Content:</label>
              <textarea class="form-control" name="content"></textarea>
          </div>

          <div class="form-group">
              <label for="slug">Slug:</label>
              <input type="text" class="form-control" name="slug"/>
          </div>
          <div class="form-group">
              <label for="preview">Preview (id from gallery):</label>
              <input type="text" class="form-control" name="preview"/>
          </div>
          <div class="form-group">
              <label for="main_image">Image (id from gallery):</label>
              <input type="text" class="form-control" name="main_image"/>
          </div>
          <button type="submit" class="btn btn-primary">Add post</button>
      </form>
  </div>
</div>
</div>
@endsection