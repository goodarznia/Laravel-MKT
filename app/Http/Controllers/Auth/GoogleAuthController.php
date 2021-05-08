<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Dotenv\Util\Str;
class GoogleAuthController extends Controller
{
    public function redirect()
    {

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {

        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->getEmail())->first();
            if ($user) {
                auth()->loginUsingId($user->id);

            } else {
                $newuser = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'password' => bcrypt(\Str::random(16)),

                ]);
                auth()->loginUsingId($newuser->id);

            }
            return redirect('/user_area/datasets');

        } catch (\Exception $e) {
            //TODO Error handling
            return 'Error!';
        }

    }

}
