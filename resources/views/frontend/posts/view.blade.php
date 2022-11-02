@extends('layouts.app')

@section('content')
    <div class="">
        <header class="masthead" style="background-image: url('../assets/images/gambar-1.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Detail Postingan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container bg-white p-4">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-2">
                    <h3>{{ $post->title }}
                        <a href="{{ url('/posts') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                    </h3>
                    <small>Author by <a
                            href="{{ url('posts/author/' . $post->user->id) }}"><b>{{ $post->user->name }}</b></a>
                        in <a
                            href="{{ url('posts/category/' . $post->category->slug) }}"><b>{{ $post->category->name }}</b></a>
                        Category</small>
                </div>
                @if ($post->image)
                    <div class="col-md-12 mb-4 text-center my-3">
                        <img src="{{ asset("$post->image") }}" height="500px" />
                    </div>
                @endif
                <div class="col-md-12">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection
