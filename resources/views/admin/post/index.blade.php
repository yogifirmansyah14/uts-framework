@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/post/create') }}" class="btn btn-primary text-white float-end">Add New Post</a>
            <h3>Post View</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Excerpt</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>
                            <a href="{{ url('admin/post/'.$post->id.'/view') }}" class="btn btn-sm btn-primary text-white">View</a>
                            <a href="{{ url('admin/post/'.$post->id.'/edit') }}" class="btn btn-sm btn-success text-white">Update</a>
                            <a href="{{ url('admin/post/'.$post->id.'/delete') }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are You Sure Want To Delete This Data?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
