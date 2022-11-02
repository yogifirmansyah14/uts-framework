@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('{{ $lastPost[0]->image }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $lastPost[0]->title }}</h1>
                        <h2 class="subheading">{!! $lastPost[0]->excerpt !!}</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $lastPost[0]->user->name }}</a>
                            {{ $lastPost[0]->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-3">
        <div class="row mb-4">
            <div class="col-md-12 mb-2">
                <h3 class="text-center">All Posts</h3>
            </div>
        </div>

        <livewire:frontend.post.index :authors="$authors" :categories="$categories" />

    </div>
@endsection
