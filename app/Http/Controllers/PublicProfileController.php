<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicProfileController extends Controller
{
    public function show(User $user){
        $posts = Post::where('user_id', $user->id)->get();
        return Inertia::render('PublicProfile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
