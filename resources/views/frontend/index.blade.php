@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('assets/images/gambar-1.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5">
        <div class="row mb-4">
            <div class="col-md-12 mb-2">
                <h3 class="text-center">Newest Post</h3>
                <hr>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-4 mb-3">
                @foreach ($post as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 22rem;">
                            <img src="{{ asset($post->image) }}" style="height: 15rem; object-fit: cover"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <small>Author by <a href="{{ url('posts/author/' . $post->user->name) }}"
                                        class="text-decoration-none">{{ $post->user->name }}</a> in <a
                                        href="{{ url('posts/category/' . $post->category->slug) }}"
                                        class="text-decoration-none">{{ $post->category->name }}</a> Category</small>
                                <p class="card-text"><small class="text-muted">Published at
                                        {{ $post->created_at->diffForHumans() }}</small></p>
                                <a href="{{ url('/posts/' . $post->slug) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Pager-->
                @if ($jumlah >= 4)
                    <div class="d-flex justify-content-center mb-4"><a class="btn btn-primary text-uppercase"
                            href="{{ url('/posts') }}">Older
                            Posts →</a></div>
                @else
                    <div class="container"></div>
                @endif
            </div>
        </div>
    </div>
@endsection
