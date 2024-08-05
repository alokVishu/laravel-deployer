<?php

namespace App\Livewire\Filament;

use App\Services\ConfigManager;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use ValentinMorice\FilamentJsonColumn\FilamentJsonColumn;

class PaymentProviders extends Component implements HasForms
{
  use InteractsWithForms;

  private ConfigManager $configManager;

  public ?array $data = [];

  public function render()
  {
    return view('livewire.filament.payment-providers');
  }

  public function boot(ConfigManager $configManager): void
  {
    $this->configManager = $configManager;
  }

  public function mount(): void
  {
    $this->form->fill([
      'payment_provider' => $this->configManager->get('app.payment_provider'),
      'products' => json_decode($this->configManager->get('app.products'), true),
    ]);
  }

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make(__('Payment Providers'))->schema([
          Radio::make('payment_provider')
            ->label('Default payment provider')
            ->options([
              'stripe' => 'Stripe',
              'lemonsqueezy' => 'Lemon Squeezy',
            ])
            ->descriptions([
              'stripe' => 'If enabled, customers will be able to pay using stripe.',
              'lemonsqueezy' => 'If enabled, customers will be able to pay using lemon squeezy.',
            ]),
          Fieldset::make('Products Json')
            ->label('JSON')
            ->schema([
              FilamentJsonColumn::make('products')->label('Products')->helperText('This is the products data in json format.')->accent('#d97708'),
              Placeholder::make('Example')->content(
                new HtmlString('
              As per the above selected payment provider, you have to add product data in json format. The product json format is different for each payment provider. Please refer the corresponding payment provider related documentation for the product json format.

              <ul>
                <li class="pt-2">
                  <strong>Stripe:</strong> <a href="https://stripe.com/docs/api/products/create" class="text-primary-500" target="_blank">Stripe Product Documentation</a>
                </li>
                <li class="pt-2">
                  <strong>Lemon Squeezy:</strong> <a href="#" target="_blank" class="text-primary-500">Lemon Squeezy Product Documentation</a>
                </li>
              </ul>
              '),
              ),
            ]),
        ]),
      ])

      ->statePath('data');
  }

  public function save()
  {
    $data = $this->form->getState();


    $this->configManager->set('app.payment_provider', $data['payment_provider']);
    $this->configManager->set('app.products', json_encode($data['products']));

    Notification::make()->title(__('Settings Saved'))->success()->send();
  }
}
