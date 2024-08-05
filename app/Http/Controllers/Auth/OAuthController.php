<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;

class OAuthController extends Controller
{

  public function redirect($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  public function callback($provider)
  {

    try {

      $user = Socialite::driver($provider)->user();
    } catch (Throwable $e) {
      return redirect(route('login'))->with('error', `{{$provider}} authentication failed.`);
    }


    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
      Auth::login($existingUser);
    } else {
      $newUser = User::updateOrCreate([
        'email' => $user->email
      ], [
        'name' => $user->name,
        'twitter_id' => $user->id,
        'password' => bcrypt(request(Str::random())) // Set a random password
      ]);
      Auth::login($newUser);
    }

    return redirect('/dashboard');
  }

  public function passwordless(Request $request)
  {
    $user = User::where('email', $request->email)->first();

    if ($user) {
      Auth::login($user);
      return redirect('/dashboard');
    }

    return redirect(route('login'))->with('error', 'User not found.');
  }
}
