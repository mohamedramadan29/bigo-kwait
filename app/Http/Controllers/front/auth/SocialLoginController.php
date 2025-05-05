<?php

namespace App\Http\Controllers\front\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;


class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {
            $user_provider = Socialite::driver($provider)->user();
            $user_from_db = User::where('email', $user_provider->getEmail())->first();
            //dd($user);
            if ($user_from_db) {
                Auth::login($user_from_db);
                return redirect()->route('user.account');
            }
            $user = User::create([
                'name' => $user_provider->name,
                'email' => $user_provider->email,
                'type' => 'company',
                'email_active' => 1,
                'password' => Hash::make(Str::random(8)),
            ]);
            Auth::login($user);
            return redirect()->route('user.account');
        } catch (\Exception $e) {
            return redirect()->route('user.login')->with('error', 'حدث خطأ حاول مرة اخرى');
        }
    }
}
