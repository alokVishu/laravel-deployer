<?php

namespace App\Providers;

use App\Models\NewsLetter;
use Illuminate\Support\ServiceProvider;

class NewsLetterServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    view()->composer('*', function ($view) {
      $newsLetter = NewsLetter::where('active', true)->first();
      $view->with('newsLetter', $newsLetter);
    });
  }
}
