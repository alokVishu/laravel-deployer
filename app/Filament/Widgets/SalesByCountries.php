<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;


class SalesByCountries extends Widget
{
  protected static ?int $sort = 6;

  protected int | string | array $columnSpan = [
    'md' => 12,
    'xl' => 4,
  ];

  public array $countrySales = [
    ['title' => 'United States', 'sales' => '$8,567k', 'yoygrowth' => 25.8],
    ['title' => 'Brazil', 'sales' => '$2,415k', 'yoygrowth' => -6.2],
    ['title' => 'India', 'sales' => '$865k', 'yoygrowth' => 12.4],
    ['title' => 'Australia', 'sales' => '$745k', 'yoygrowth' => -11.9],
    ['title' => 'France', 'sales' => '$45k', 'yoygrowth' => 16.2],
    ['title' => 'China', 'sales' => '$12k', 'yoygrowth' => 14.8],
  ];

  public function getFlag(string $country): string
  {
    return match ($country) {
      'United States' => asset('images/icons/countries/us.png'),
      'Brazil' => asset('images/icons/countries/br.png'),
      'India' => asset('images/icons/countries/in.png'),
      'Australia' => asset('images/icons/countries/au.png'),
      'France' => asset('images/icons/countries/fr.png'),
      'China' => asset('images/icons/countries/cn.png'),
    };
  }

  protected static string $view = 'filament.widgets.sales-by-countries';
}
