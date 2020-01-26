@extends('base') 

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="image"><img src="/images/{{$image->filename}}" /></div>
        <div class="description">{{ $image->description }}</div>
        <div class="tags">
          @foreach ($tags as $tag)
            {{$tag->name}}@if (!$loop->last), @endif
          @endforeach
        </div>
    </div>
</div>
@endsection