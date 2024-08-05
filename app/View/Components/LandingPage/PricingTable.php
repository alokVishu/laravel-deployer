<?php

namespace App\View\Components\LandingPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PricingTable extends Component
{
  public $title;
  public $promoMessage;
  public $plans;
  public $licenseDetails;
  public $features;
  /**
   * Create a new component instance.
   */

  public function __construct($title, $promoMessage, $plans, $licenseDetails, $features)
  {
    $this->title = $title;
    $this->promoMessage = $promoMessage;
    $this->plans = $plans;
    $this->licenseDetails = $licenseDetails;
    $this->features = $features;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.landing-page.pricing-table');
  }
}
