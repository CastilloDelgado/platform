<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicProfileController extends Controller
{
    public function show(User $user){
        return Inertia::render('PublicProfile', [
            'user' => $user,
            'posts' => $user->posts
        ]);
    }
}
