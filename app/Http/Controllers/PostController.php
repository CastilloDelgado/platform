<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function index ()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)->paginate(10)->latest();

        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function show (Post $post){
        $post->comments;
        $post->images;
        $post->user;

        if(!auth()->user() || auth()->user()->id != $post->user_id){
            $post->view_count = $post->view_count + 1;
            $post->save();
        }

        return Inertia::render('Post', [
            'post' => $post,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function create()
    {
        return Inertia::render('CreatePost', [
            'categories' => Category::all(),
        ]);
    }

    public function edit(Post $post){
        $post->images;
        return Inertia::render('EditPost', [
            'post'=> $post,
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

        $post = auth()->user()->posts()->create($validated);

        // Saving images

        $imageFiles = $request->file('images');  
        $imageUrls = [];

        foreach($imageFiles as $imageFile){
            $imageUrl = $imageFile->store('post-images');
            $post->images()->create(['image_url' => $imageUrl]);
        }   

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

