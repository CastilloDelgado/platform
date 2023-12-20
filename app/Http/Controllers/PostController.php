<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;

class PostController extends Controller
{
    public function index ()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)->paginate(10);

        return Inertia::render('Dashboard', [
            'posts' => $posts
        ]);
    }


    public function create()
    {
        return Inertia::render('CreatePost', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=> ['required','string','max:255'],
            'slug'=> ['required','string','max:255'],
            'excerpt' => ['required','string'],
            'body'=> ['required', 'string'],    
            'category_id' => ['required','integer'],
            'thumbnail_url' => ['required', 'image']
        ]);   

        $mainImagePath = $request->file('thumbnail_url')->store('thumbnails'); 

        $validated['thumbnail_url'] = $mainImagePath;

        auth()->user()->posts()->create($validated);

        return redirect(route('dashboard'));
    }

    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title'=> ['required','string','max:255'],
            'slug'=> ['required','string','max:255'],
            'excerpt' => ['required','string'],
            'body'=> ['required', 'string'],    
            'category_id' => ['required','integer'],
        ]);   

        $post->update($validated);  

        return redirect(route('dashboard'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect(route('dashboard'));
    }
}

