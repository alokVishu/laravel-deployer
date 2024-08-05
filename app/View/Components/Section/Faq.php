<?php

namespace App\View\Components\Section;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Faq extends Component
{

  public $LeftAccordionFaqs = [
    [
      "question" => 'What is LaraSaas? Why do I need a LaraSaas Boilerplate?',
      "answer" => 'LaraSaas is a Laravel boilerplate specifically designed to help you launch your SaaS application quickly and efficiently. It provides pre-built features for user management, subscriptions, payments, and more, saving you significant development time and effort.'
    ],
    [
      "question" => 'Is there a demo available?',
      "answer" => 'Absolutely! We recommend exploring the demo to experience LaraSaas\'s capabilities firsthand. (Link to Demo)'
    ],
    [
      "question" => 'Which payment providers are supported?',
      "answer" => 'LaraSaas integrates with popular payment gateways like Stripe and Lemon Squeezy for easy payment processing.'
    ],
    [
      "question" => 'How is the codebase distributed?',
      "answer" => 'Upon purchase, you\'ll receive the LaraSaas codebase through a secure download link or version control system (e.g., Git) access.'
    ],
    [
      "question" => 'I want to integrate LaraSaas into my existing project. Should I buy it?',
      "answer" => 'LaraSaas is designed as a foundation for a new SaaS application. Integrating it into an existing project might require additional development work.'
    ]

  ];

  public $RightAccordionFaqs = [
    [
      "question" => 'How many developers can access the product?',
      "answer" => 'Our licensing plans typically allow access for a certain number of developers. Check the specific plan details for this information.'
    ],
    [
      "question" => 'How can I upgrade the license?',
      "answer" => 'Upgrading your license is easy! We offer a clear upgrade path within your account dashboard.'
    ],
    [
      "question" => 'Can I transfer the license to another person?',
      "answer" => 'Our licenses are generally not transferable to maintain fair use and support.'
    ],
    [
      "question" => 'Can I get a refund?',
      "answer" => 'Due to the digital nature of the product, we are unable to offer refunds after download. We encourage you to carefully review the features and functionalities of LaraSaas before purchasing.'
    ],
    [
      "question" => 'Can I use LaraSaas Boilerplate in an open source project?',
      "answer" => 'Our license typically restricts use in open-source projects. However, we offer separate open-source licensing options. Contact us for details.'
    ],
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
    return view('components.section.faq');
  }
}
