<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class FinanceMetricStats extends Widget
{

  protected static ?int $sort = 4;
  protected int | string | array $columnSpan = [
    'md' => 4,
    'xl' => 4,
  ];

  public array $financialMetricsData = [
    [
      'title' => 'Average Revenue Per User (ARPU)',
      'value' => '$45.67',
      'color' => 'primary',
      'widgetIcon' => 'tabler-currency-dollar',
      'difference' => '8.9%',
      'differenceIcon' => 'tabler-trending-up',
      'differenceTime' => 'vs prev. month',
      'differenceTextColor' => 'success'
    ],
    [
      'title' => 'Average Order value',
      'value' => '$295.00',
      'color' => 'primary',
      'widgetIcon' => 'tabler-shopping-cart',
      'difference' => '5.4%',
      'differenceIcon' => 'tabler-trending-up',
      'differenceTime' => 'vs prev. month',
      'differenceTextColor' => 'success'
    ],
    [
      'title' => 'Refunds',
      'value' => '12',
      'color' => 'primary',
      'widgetIcon' => 'tabler-refresh',
      'difference' => '-6.3%',
      'differenceIcon' => 'tabler-trending-down',
      'differenceTime' => 'vs prev. month',
      'differenceTextColor' => 'danger'
    ]
  ];


  public function render(): View
  {
    return view('filament.widgets.financial-metric-stats');
  }
}
