@extends('base') 

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">{{ $post->header }}</h1>
        <div class="content">{{ $post->content }}</div>
    </div>
</div>
@endsection