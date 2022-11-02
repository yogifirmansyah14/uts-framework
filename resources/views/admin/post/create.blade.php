@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/post') }}" class="btn btn-danger text-white float-end">Back</a>
            <h3>Add New Post</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="mb-1 fw-bold">Category</label>
                        <select name="category_id" class="form-control">
                            <option selected>-- Select Category --</option>
                            @foreach ($categories as $category)
                                @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>                                                                
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="mb-1 fw-bold">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="mb-1 fw-bold">Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="mb-1 fw-bold">Slug</label>
                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}">
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
                        <input id="x" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="x"></trix-editor>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">Add Post</button>
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