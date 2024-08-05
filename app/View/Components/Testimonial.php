<?php

namespace App\View\Components;

use App\Models\Review;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Testimonial extends Component
{
  public $reviews;

  public function __construct()
  {
    // Fetch only the featured reviews
    $this->reviews = Review::where('is_featured', true)->get();
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.testimonial.index');
  }
}
