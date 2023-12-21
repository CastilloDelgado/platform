<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect () {
        return Socialite::driver('google')->redirect();
    }
     
    public function logout (Request $request) {
        Auth::logout();
        return redirect(route('welcome'));
    }

    public function callback () {
        $googleUser = Socialite::driver('google')->user();


        $user = User::firstOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'username' => $googleUser->nickname,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
        ]);

        Auth::login($user);

        return redirect(route('dashboard'));

    }
}
