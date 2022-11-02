@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/post') }}" class="btn btn-danger text-white float-end">Back</a>
            <h3>Edit Article</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/article/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="mb-1 fw-bold">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-6 mb-3">
                        @if ($post->image)
                        <img src="{{ asset("$post->image") }}" width="100px" height="100px">
                        @else
                        <div class="alert alert-danger text-center">
                            No Image Added
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="mb-1 fw-bold">Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="mb-1 fw-bold">Slug</label>
                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $post->slug }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="mb-1 fw-bold">Body</label>
                        @error('body')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <input id="x" type="hidden" name="body" value="{{ $post->body }}">
                        <trix-editor input="x"></trix-editor>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">Update Post</button>
                    </div>
                </div>                
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- Create Slug -->
    <script>
        $('#title').change(function(e) {
            $.get('{{ url('check_slug') }}', { 'title': $(this).val() }, function( data ) {
                $('#slug').val(data.slug);
            });
        });
    </script>
@endsection