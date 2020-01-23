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
    <a href="{{ route('image.create')}}" class="btn btn-primary mb-3"></a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><a href="{{ route('image.show',$post->id)}}">{{$post->header}}</a></td>
            <td>
                <a href="{{ route('image.edit',$post->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('image.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection