<?php

namespace App\Http\Livewire\Frontend\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categories, $authors, $authorsInput = [], $categoriesInput = [];

    protected $queryString = [
        'authorsInput' => ['except' => '', 'as' => 'author'],
        'categoriesInput' => ['except' => '', 'as' => 'category'],
    ];

    public function mount($authors, $categories)
    {
        $this->authors = $authors;
        $this->categories = $categories;
    }

    public function render()
    {
        $posts = Post::latest()
                        ->when($this->authorsInput, function ($q) {
                            $q->where('user_id', $this->authorsInput);
                        })
                        ->when($this->categoriesInput, function ($q) {
                            $q->where('category_id', $this->categoriesInput);
                        })->paginate(7);

        return view('livewire.frontend.post.index', [
            'posts' => $posts,
            'authors' => $this->authors,
            'categories' => $this->categories
        ]);
    }
}
