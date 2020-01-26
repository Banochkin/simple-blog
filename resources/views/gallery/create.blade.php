@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add image</h1>
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
      <form method="post" enctype="multipart/form-data" action="{{ route('image.upload.post') }}">
          @csrf
          <div class="form-group">    
              <label for="image">Select image:</label>
              <input type="file" name="image" class="form-control">
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" name="description"></textarea>
          </div>

          <div class="form-group">
              <label for="tags">Tags (tag 1, tag 2, etc):</label>
              <textarea class="form-control" name="tags"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add image</button>
      </form>
  </div>
</div>
</div>
@endsection






{{-- <!DOCTYPE html>
<html>
<head>
    <title>laravel 6 image upload example - ItSolutionStuff.com.com</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
</head>
  
<body>
<div class="container">
   
    <div class="panel panel-primary">
      <div class="panel-heading"><h2>laravel 6 image upload example - ItSolutionStuff.com.com</h2></div>
      <div class="panel-body">
  
        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
  
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>
   
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
   
            </div>
        </form>
  
      </div>
    </div>
</div>
</body>
  
</html> --}}