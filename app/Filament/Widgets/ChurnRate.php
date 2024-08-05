<?php

namespace App\Filament\Widgets;

use Filament\Support\RawJs;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ChurnRate extends ApexChartWidget
{
  /**
   * Chart Id
   *
   * @var string
   */
  protected static ?string $chartId = 'churnRate';

  /**
   * Widget Title
   *
   * @var string|null
   */
  protected static ?string $heading = 'Churn Rate';

  protected static ?int $contentHeight = 300;

  protected static ?int $sort = 2;

  protected int | string | array $columnSpan = [
    'md' => 4,
    'xl' => 4,
  ];

  /**
   * Chart options (series, labels, types, size, animations...)
   * https://apexcharts.com/docs/options
   *
   * @return array
   */
  protected function getOptions(): array
  {
    return [
      'chart' => [
        'type' => 'line',
        'height' => 300,
        'parentHeightOffset' => 0,
        'toolbar' => ['show' => false],
      ],
      'series' => [
        [
          'name' => 'ChurnRate',
          'data' => [8.2, 7, 7.8, 5.9, 6.2, 5.5],
        ],
      ],
      'xaxis' => [
        'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        'axisBorder' => ['show' => false],
        'axisTicks' => ['show' => false],
        'labels' => [
          'style' => [
            'colors' => 'rgba(var(--gray-400), 1)',
            'fontFamily' => 'inherit',
          ],
        ],
      ],
      'yaxis' => [
        'labels' => [
          'offsetX' => -10,
          'style' => [
            'colors' => 'rgba(var(--gray-400), 1)',
            'fontFamily' => 'inherit',
          ],
        ],
      ],
      'grid' => [
        'strokeDashArray' => 6,
        'borderColor' => 'rgba(var(--gray-400), 0.5)',
        'xaxis' => [
          'lines' => ['show' => true]
        ],
        'yaxis' => [
          'lines' => ['show' => false]
        ],
        'padding' => [
          'left' => 10,
          'right' => 2,
          'top' => -10,
          'bottom' => -8
        ],
      ],
      'markers' => [
        'size' => 5,
        'strokeWidth' => 4,
        'colors' => '#FFF',
        'strokeColors' => '#FCAA1D'
      ],
      'colors' => ['#FCAA1D'],
      'stroke' => [
        'width' => 4,
        'lineCap' => 'butt',
        'curve' => 'straight'
      ],
    ];
  }

  protected function extraJsOptions(): ?RawJs
  {
    return RawJs::make(<<<'JS'
    {
        yaxis: {
          labels: {
            formatter: val => `${val}%`,
          }
        },
    }
    JS);
  }
}
