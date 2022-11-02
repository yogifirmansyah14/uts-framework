@extends('layouts.admin')

@section('content')
<div class="container bg-white py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-2">
            <h3>{{ $post->title }}
                <a href="{{ url('admin/post') }}" class="btn btn-primary btn-sm text-white float-end ms-2">BACK</a>
                <a href="{{ url('admin/post') }}" class="btn btn-success btn-sm text-white float-end ms-2">Update</a>
                <a href="{{ url('admin/post') }}" class="btn btn-danger btn-sm text-white float-end">Delete</a>
            </h3>
            <small>Author by <b>{{ $post->user->name }}</b> in <b>{{  $post->category->name  }}</b> Category</small>
        </div>
        @if ($post->image)
        <div class="col-md-8 mb-4">
            <img src="{{ asset("$post->image") }}" width="200px" height="200px" />
        </div>
        @endif
        <div class="col-md-8">
            {!! $post->body !!}
        </div>
    </div>
</div>
@endsection