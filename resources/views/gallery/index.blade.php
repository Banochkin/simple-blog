@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Gallery</h1>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
    @endif
    <a href="{{ route('gallery.create')}}" class="btn btn-primary mb-3">Add image</a>
  <table class="table table-striped table__gallery">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($images as $image)
        <tr>
            <td>{{$image->id}}</td>
            <td>
              <a href="{{ route('gallery.show',$image->id)}}"><img src="/images/{{$image->filename}}" /></a><br />
              {{$image->description}}
            </td>
            <td>
                <a href="{{ route('gallery.edit',$image->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('gallery.destroy', $image->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection