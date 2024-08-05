<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ActiveSubscriptions extends ApexChartWidget
{
  /**
   * Chart Id
   *
   * @var string
   */
  protected static ?string $chartId = 'activeSubscriptions';

  protected static ?int $sort = 5;

  protected int | string | array $columnSpan = [
    'md' => 4,
    'xl' => 4,
  ];

  /**
   * Widget Title
   *
   * @var string|null
   */
  protected static ?string $heading = 'Active Subscriptions';

  /**
   * Chart options (series, labels, types, size, animations...)
   * https://apexcharts.com/docs/options
   *
   * @return array
   */

  protected static ?int $contentHeight = 415; //px
  protected function getOptions(): array
  {
    return [
      'chart' => [
        'type' => 'donut',
        'height' => 415,
      ],
      'series' => [60, 25, 15],
      'labels' => ["Plan A", "Plan B", "Plan C"],
      'legend' => [
        'position' => 'bottom',
        'labels' => [
          'fontFamily' => 'inherit',
        ],
      ],
      'tooltip' => ['enabled' => false],
      'stroke' => ['width' => 0],
      'colors' => ['#794DFF', '#AF8DFF', '#C7AFFF'],
      'states' => [
        'hover' => [
          'filter' => ['type' => 'none']
        ],
        'active' => [
          'filter' => ['type' => 'none']
        ]
      ],
    ];
  }
}
