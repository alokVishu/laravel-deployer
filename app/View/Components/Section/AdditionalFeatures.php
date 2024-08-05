<?php

namespace App\View\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdditionalFeatures extends Component
{
  /**
   * Create a new component instance.
   */

  public $features = [
    [
      'icon' => 'tabler-diamond',
      'title' => 'Brand Your SaaS',
      'description' => 'Customize colors, emails, and more to match your brand identity.'
    ],
    [
      'icon' => 'tabler-elevator',
      'title' => 'Components',
      'description' => 'Includes ready-to-use components like Plans & Pricing, hero sections, features, and more.'
    ],
    [
      'icon' => 'tabler-file-text',
      'title' => 'SaaS Blog',
      'description' => 'Publish articles and tutorials to educate your audience and enhance SEO.'
    ],
    [
      'icon' => 'tabler-git-merge',
      'title' => 'Prioritize Your Roadmap',
      'description' => 'Collect customer feedback and allow users to vote on features and bug fixes.'
    ],
    [
      'icon' => 'tabler-mail',
      'title' => 'Custom Emails',
      'description' => 'Engage customers with beautifully designed, brand-adaptive email templates.'
    ],
    [
      'icon' => 'tabler-apps',
      'title' => 'Plugins',
      'description' => 'Supports auth, payment, email providers, chatbot, and analytics plugins.'
    ],
    [
      'icon' => 'tabler-report-search',
      'title' => 'SEO Ready',
      'description' => 'Built-in features to improve search engine rankings.'
    ],
    [
      'icon' => 'tabler-edit',
      'title' => 'Customization',
      'description' => 'Full ownership of the code allows for complete customization.'
    ],
    [
      'icon' => 'tabler-code',
      'title' => 'Dev Friendly Core',
      'description' => 'Clean code and tools for a smooth development experience.'
    ],
    [
      'icon' => 'tabler-device-mobile',
      'title' => 'Mobile Friendly',
      'description' => 'The UI is optimized for mobile devices.'
    ],
    [
      'icon' => 'tabler-report-money',
      'title' => 'Rich Documentation',
      'description' => 'Comprehensive documentation to guide you from start to finish.'
    ],
    [
      'icon' => 'tabler-text-resize',
      'title' => 'Translation Ready',
      'description' => 'Translate your app to reach a global audience.'
    ],
  ];
  public function __construct()
  {
    //
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.section.additional-features');
  }
}
