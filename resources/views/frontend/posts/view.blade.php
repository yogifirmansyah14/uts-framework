@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark">
    <div class="container bg-white p-4">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-2">
                <h3>{{ $post->title }}
                    <a href="{{ url('/posts') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
                <small>Author by <a href="{{ url('posts/author/'.$post->user->id) }}"><b>{{ $post->user->name }}</b></a> in <a href="{{ url('posts/category/'.$post->category->slug) }}"><b>{{  $post->category->name  }}</b></a> Category</small>
            </div>
            @if ($post->image)
            <div class="col-md-12 mb-4">
                <img src="{{ asset("$post->image") }}" width="200px" height="200px" />
            </div>
            @endif
            <div class="col-md-12">
                {!! $post->body !!}
            </div>
        </div>
    </div>
</div>
@endsection