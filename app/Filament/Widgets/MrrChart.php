<?php

namespace App\Filament\Widgets;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;
use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class MrrChart extends ApexChartWidget
{
  /**
   * Chart Id
   *
   * @var string
   */
  protected static ?string $chartId = 'mrrChart';

  protected static ?int $sort = 3;

  protected int | string | array $columnSpan = [
    'md' => 8,
    'xl' => 8,
  ];

  /**
   * Widget Title
   *
   * @var string|null
   */
  protected static ?string $heading = 'Monthly Recurring Revenue';

  protected static ?int $contentHeight = 300;

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
        'type' => 'bar',
        'height' => 300,
        'parentHeightOffset' => 0,
        'toolbar' => ['show' => false],
      ],
      'plotOptions' => [
        'bar' => [
          'borderRadius' => 6,
          'columnWidth' => '40%',
          'dataLabels' => ['position' => 'top']
        ],
      ],
      'dataLabels' => [
        'enabled' => true,
      ],
      'legend' => ['show' => false],
      'series' => [
        [
          'name' => 'MrrCharts',
          'data' => [5, 8, 11, 13, 15, 18, 20, 22],
        ],
      ],
      'xaxis' => [
        'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'August'],
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
      'dataLabels' => [
        'offsetY' => -25,
        'style' => [
          'fontWeight' => 500,
          'colors' => ['rgba(var(--gray-400), 1)'],
          'fontSize' => '15px'
        ]
      ],
      'grid' => [
        'strokeDashArray' => 6,
        'borderColor' => 'rgba(var(--gray-400), 0.5)',
        'xaxis' => [
          'lines' => ['show' => false]
        ],
        'yaxis' => [
          'lines' => ['show' => true]
        ],
        'padding' => [
          'left' => 5,
          'top' => -10,
          'bottom' => -8
        ],
      ],
      'colors' => ['rgb(121, 77, 255)'],
      'responsive' => [
        [
          'breakpoint' => 680,
          'options' => [
            'dataLabels' => [
              'enabled' => false,
            ],
          ],
        ],
      ],
    ];
  }

  protected function extraJsOptions(): ?RawJs
  {
    return RawJs::make(<<<'JS'
    {
        dataLabels: {
          formatter: val => `${val}k`
        },
        yaxis: {
          labels: {
            formatter: val => `$${val}k`,
          }
        },
    }
    JS);
  }
}
