<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function posts()
    {
        $authors = User::all();
        $categories = Category::all();
        return view('frontend.posts.index', compact('authors', 'categories'));
    }

    public function viewpost($post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();
        return view('frontend.posts.view', compact('post'));
    }

    public function author($author)
    {
        $user = User::where('name', $author)->first();
        $posts = Post::where('user_id', $user->id)->get();
        return view('frontend.posts.author', compact('user','posts'));
    }
    
    public function category($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        $posts = Post::where('category_id', $category->id)->get();

        return view('frontend.posts.category', compact('posts', 'category'));
    }
}
