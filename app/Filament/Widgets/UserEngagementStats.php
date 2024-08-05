<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class UserEngagementStats extends Widget
{

  protected static ?int $sort = 1;
  protected int | string | array $columnSpan = 'full';

  public array $userEngagementData = [
    [
      'title' => 'Monthly Active Users',
      'value' => '8.25k',
      'color' => 'primary',
      'widgetIcon' => 'tabler-users',
      'difference' => '15.4%',
      'differenceIcon' => 'tabler-trending-up',
      'differenceTime' => 'vs prev. month',
      'differenceTextColor' => 'success'
    ],
    [
      'title' => 'Customer Churn Rate',
      'value' => '2.8%',
      'color' => 'primary',
      'widgetIcon' => 'tabler-chart-bar',
      'difference' => '-1.2%',
      'differenceIcon' => 'tabler-trending-down',
      'differenceTime' => 'vs prev. month',
      'differenceTextColor' => 'success'
    ],
    [
      'title' => 'Monthly Recurring Revenue (MRR)',
      'value' => '$12.5k',
      'color' => 'primary',
      'widgetIcon' => 'tabler-receipt',
      'difference' => '12.7%',
      'differenceIcon' => 'tabler-trending-up',
      'differenceTime' => 'vs prev. month',
      'differenceTextColor' => 'success'
    ]
  ];


  public function render(): View
  {
    return view('filament.widgets.user-engagement-stats');
  }
}
