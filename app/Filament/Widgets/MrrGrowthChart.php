<?php

namespace App\Filament\Widgets;

use Filament\Support\RawJs;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class MrrGrowthChart extends ApexChartWidget
{
  /**
   * Chart Id
   *
   * @var string
   */
  protected static ?string $chartId = 'mrrGrowthChart';

  protected static ?int $sort = 8;

  protected int | string | array $columnSpan = [
    'md' => 4,
    'xl' => 4,
  ];

  /**
   * Widget Title
   *
   * @var string|null
   */
  protected static ?string $heading = 'MRR Growth Chart';

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
        'type' => 'area',
        'height' => 300,
        'parentHeightOffset' => 0,
        'toolbar' => ['show' => false],
      ],
      'series' => [
        [
          'name' => 'MrrGrowthChart',
          'data' => [28, 40, 36, 52, 38, 60],
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
        'min' => 25,
        'max' => 62,
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
        'padding' => [
          'left' => 5,
          'right' => 2,
          'top' => -10,
          'bottom' => -8
        ],
      ],
      'colors' => ['#02CA4B'],
      'fill' => [
        'type' => 'gradient',
        'gradient' => [
          'opacityTo' => 0,
          'opacityFrom' => 1,
          'shadeIntensity' => 1,
          'stops' => [0, 100],
          'colorStops' => [
            [
              [
                'offset' => 0,
                'opacity' => 0.4,
                'color' => '#02CA4B'
              ],
              [
                'opacity' => 0,
                'offset' => 100,
                'color' => '#fff'
              ]
            ]
          ]
        ]
      ],
      'stroke' => [
        'curve' => 'smooth',
        'lineCap' => 'round',
      ],
      'dataLabels' => [
        'enabled' => false,
      ],
    ];
  }

  protected function extraJsOptions(): ?RawJs
  {
    return RawJs::make(<<<'JS'
    {
        yaxis: {
          labels: {
            formatter: val => `${Math.round(val)}k`,
          }
        },
    }
    JS);
  }
}
