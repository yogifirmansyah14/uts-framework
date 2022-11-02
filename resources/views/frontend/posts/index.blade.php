@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row mb-4">
            <div class="col-md-12 mb-2">
                <h3 class="text-center">All Posts</h3>
            </div>
        </div>
        
        <livewire:frontend.post.index :authors="$authors" :categories="$categories" />

    </div>
@endsection