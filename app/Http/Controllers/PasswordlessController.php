<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Notifications\Login;
use Illuminate\Support\Facades\Auth;

class PasswordlessController extends Controller
{
  //
  public function create()
  {
    return view('auth.password-less-login');
  }

  public function store(Request $request)
  {

    // validate User input
    request()->validate([
      'email' => 'required'
    ]);

    $user = User::where('email', request('email'))->first();

    if (!$user) {
      return back()->withErrors(['email' =>  'No matching account found.']);
    }

    $link = URL::temporarySignedRoute(
      'auth.passwordless.login.token',
      now()->addMinutes(30),
      ['user' => $user->id]
    );

    $user->notify(new Login($link));

    return back()->with(['status' => 'Please check your email for the login link.']);
  }

  public function loginViaToken(User $user)
  {
    Auth::login($user);

    request()->session()->regenerate();

    return redirect('/');
  }
}
