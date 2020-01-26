@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Blog</div>
                <div class="card-body">
                    <ul>
                        <li><a href="/blog">Open blog</a></li>
                        <li><a href="/json/blog">Open blog json</a></li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Gallery</div>
                <div class="card-body">
                    <ul>
                        <li><a href="/gallery">Open gallery</a></li>
                        <li><a href="/json/gallery">Open blog json</a></li>
                    </ul>
                    <p>Add id of tag afrer /gallery/ to open json with images with this tag.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
