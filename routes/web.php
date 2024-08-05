<?php

use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\PasswordlessController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// OAuth routes for social login
Route::get('/auth/{provider}/redirect', [OAuthController::class, 'redirect'])
  ->where('provider', 'google|github|facebook|twitter')
  ->name('auth.oauth.redirect');

Route::get('/auth/{provider}/callback', [OAuthController::class, 'callback'])
  ->where('provider', 'google|github|facebook|twitter')
  ->name('auth.oauth.callback');

// Routes for passwordless login
Route::get('/auth/passwordless', [PasswordlessController::class, 'create'])
  ->name('auth.passwordless');

Route::post('/auth/passwordless', [PasswordlessController::class, 'store'])
  ->name('auth.passwordless.login');

Route::get('/auth/passwordless/{user}', [PasswordlessController::class, 'loginViaToken'])
  ->name('auth.passwordless.login.token')->middleware('signed');


Route::get('/roadmap', [App\Http\Controllers\RoadmapController::class, 'index'])->name('roadmap')->middleware('verified');
Route::get('/roadmap/i/{itemSlug}', [App\Http\Controllers\RoadmapController::class, 'viewItem'])->name('roadmap.viewItem');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/checkout', [App\Http\Controllers\ProductController::class, 'checkout'])->name('products.checkout');
Route::post('/stripe-secret', [App\Http\Controllers\ProductController::class, 'checkoutStripe'])->name('products.checkout.stripesecret');

Route::post('/checkout-lemon', [App\Http\Controllers\ProductController::class, 'checkoutLemonSqueezy'])->name('products.checkout-lemonsqueezy');


Route::get('/success', [App\Http\Controllers\ProductController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [App\Http\Controllers\ProductController::class, 'cancel'])->name('checkout.cancel');

Route::post('/webhook', [App\Http\Controllers\ProductController::class, 'webhook'])->name('checkout.webhook');

Route::get('/waitlist', [App\Http\Controllers\WaitlistController::class, 'index'])->name('waitlist.index');
Route::post('/waitlist', [App\Http\Controllers\WaitlistController::class, 'subscribe'])->name('waitlist.subscribe');

// Blog routes
Route::get('/blog', [
  App\Http\Controllers\BlogController::class, 'all',
])->name('blog');

Route::get('/blog/{slug}', [
  App\Http\Controllers\BlogController::class,
  'view',
])->name('blog.view');

Route::get('/blog/category/{slug}', [
  App\Http\Controllers\BlogController::class,
  'category',
])->name('blog.category');

Route::get('/blog/author/{name}', [
  App\Http\Controllers\BlogController::class,
  'author',
])->name('blog.author');

Route::get('/auth/pages/login-v2', function () {
  return view('pages.auth.login-v2');
})->name('login-v2');

Route::get('/auth/pages/login-v1', function () {
  return view('pages.auth.login-v1');
})->name('login-v1');

Route::get('/auth/pages/register-v1', function () {
  return view('pages.auth.register-v1');
})->name('register-v1');

Route::get('/auth/pages/register-v2', function () {
  return view('pages.auth.register-v2');
})->name('register-v2');

Route::get('/auth/pages/reset-password-v1', function () {
  return view('pages.auth.reset-password-v1');
})->name('reset-password-v1');

Route::get('/auth/pages/reset-password-v2', function () {
  return view('pages.auth.reset-password-v2');
})->name('reset-password-v2');

Route::get('/auth/pages/forgot-password-v1', function () {
  return view('pages.auth.forgot-password-v1');
})->name('forgot-password-v1');

Route::get('/auth/pages/forgot-password-v2', function () {
  return view('pages.auth.forgot-password-v2');
})->name('forgot-password-v2');

Route::get('/auth/pages/verify-email-v1', function () {
  return view('pages.auth.verify-email-v1');
})->name('verify-email-v1');

Route::get('/auth/pages/verify-email-v2', function () {
  return view('pages.auth.verify-email-v2');
})->name('verify-email-v2');

Route::get('/auth/pages/passwordless-login-v1', function () {
  return view('pages.auth.password-less-login-v1');
})->name('passwordless-login-v1');

Route::get('/auth/pages/passwordless-login-v2', function () {
  return view('pages.auth.password-less-login-v2');
})->name('passwordless-login-v2');
