<?php

namespace App\View\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerReviews extends Component
{

  public $reviews = [
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'Daeyoung',
      'country' => 'US',
      'platform' => 'Trustpilot',
      'text' => 'ThemeSelection can be a valuable tool for developers seeking quick and visually appealing UI solutions. However, keep in mind to consider evaluating your specific needs and budget before diving in.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'Vlad',
      'country' => 'US',
      'platform' => 'Trustpilot',
      'text' => 'I was genuinely impressed with Materio – MUI React Next.js Admin Template. The documentation is easy to follow, making it user-friendly for newbies. The template provides great flexibility with its customization options. Its performance is outstanding, ensuring a smooth and fast user experience. Looking forward to exploring other templates you offer.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],
    [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ], [
      'avatar' => 'https://via.placeholder.com/48',
      'name' => 'EMW',
      'country' => 'IN',
      'platform' => 'Twitter',
      'text' => 'It has been a really fantastic experience for me. It is truly developer-friendly and very easy to use. The best thing is the starter kit which helped me kick-start the project with ease. Keep up the good work.',
      'rating' => 5
    ],

    // Add other reviews similarly...
  ];
  /**
   * Create a new component instance.
   */
  public function __construct()
  {
    //
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.section.customer-reviews');
  }
}
