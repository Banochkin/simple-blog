@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Posts</h1>
    <a href="{{ route('blog.create')}}" class="btn btn-primary mb-3">New post</a>
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
            <td><a href="{{ route('blog.show',$post->id)}}">{{$post->header}}</a></td>
            <td>
                <a href="{{ route('blog.edit',$post->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('blog.destroy', $post->id)}}" method="post">
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