<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostFormRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('admin.post.index', compact('posts'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function store(PostFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        $filePath = 'uploads/posts/';
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/posts/',$filename);

            $validatedData['image'] = $filePath.$filename;
        }
        else
        {
            $validatedData['image'] = NULL;
        }

        $post = $category->posts()->create([
            'category_id' => $validatedData['category_id'],
            'user_id' => $validatedData['user_id'],
            'title' => $validatedData['title'],
            'slug' => $validatedData['slug'],
            'excerpt' => $validatedData['excerpt'],
            'body' => $validatedData['body'],
            'image' => $validatedData['image'],
        ]);

        return redirect('admin/post')->with('message', 'Post Added Successfully');
    }

    public function view(Post $post)
    {
        return view('admin.post.view', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, int $post_id)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'category_id' => 'required',
            'body' => 'required',
        ];

        $post = Category::findOrFail($request->category_id)->posts()->where('id', $post_id)->first();

        if ($request->slug != $post->slug)
        {
            $rules['slug'] = 'required|unique:posts';
        }
        
        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        $filePath = 'uploads/posts/';
        if($request->hasFile('image'))
        {
            $path = $post->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/posts/',$filename);

            $validatedData['image'] = $filePath.$filename;
        }
        else
        {
            $validatedData['image'] = $post->image;
        }

        $post->update($validatedData);


        return redirect('admin/post')->with('message', 'Post Updated Successfully');
    }

    public function destroy(int $post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(File::exists($post->image))
        {
            File::delete($post->image);
        }
        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
