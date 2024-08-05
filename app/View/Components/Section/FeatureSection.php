<?php

namespace App\View\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeatureSection extends Component
{
  /**
   * Create a new component instance.
   */

  public $featureTitle;
  public $featureIcon;
  public $title;
  public $description;
  public $featureImage;
  public $reverse;
  public $features;


  public function __construct($featureTitle, $featureIcon, $title, $description, $featureImage = null, $reverse = false, $features)
  {
    //


    $this->featureTitle = $featureTitle;
    $this->featureIcon = $featureIcon;
    $this->title = $title;
    $this->description = $description;
    $this->featureImage = $featureImage;
    $this->features = $features;
    $this->reverse = $reverse;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.section.feature-section');
  }
}
