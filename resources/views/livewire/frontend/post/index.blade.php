<div>
    <div class="row justify-content-center mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Search by Author</h4>
                </div>
                <div class="card-body">
                    @foreach ($authors as $author)
                        <label class="d-block">
                            <input type="radio" wire:model="authorsInput" value="{{ $author->id }}"> {{ $author->name }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Search by Category</h4>
                </div>
                <div class="card-body">
                    @foreach ($categories as $category)
                        <label class="d-block">
                            <input type="radio" wire:model="categoriesInput" value="{{ $category->id }}"> {{ $category->name }}
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card mb-3">
                @if ($posts[0]->image)
                <img src="{{ asset("$posts[0]->image") }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $posts[0]->title }}</h5>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <small>Author by <a href="{{ url('posts/author/'.$posts[0]->user->name) }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="{{ url('posts/category/'.$posts[0]->category->slug) }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> Category</small>
                    <p class="card-text"><small class="text-muted">Published at {{ $posts[0]->created_at->diffForHumans() }}</small></p>
                    <a href="{{ url('/posts/'.$posts[0]->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @forelse ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 22rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <small>Author by <a href="{{ url('posts/author/'.$post->user->name) }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="{{ url('posts/category/'.$post->category->slug) }}" class="text-decoration-none">{{ $post->category->name }}</a> Category</small>
                    <p class="card-text"><small class="text-muted">Published at {{ $post->created_at->diffForHumans() }}</small></p>
                    <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @empty  
        <div class="col-md-12">
            <div class="p-2">
                <h4 class="text-center">No Post Available</h4>
            </div>
        </div>
        @endforelse 
    </div>
    {{ $posts->links() }}
</div>
