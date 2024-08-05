<?php

namespace App\Livewire\Filament;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use App\Services\ConfigManager;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use ValentinMorice\FilamentJsonColumn\FilamentJsonColumn;

class MailProviders extends Component implements HasForms
{
  use InteractsWithForms;

  private ConfigManager $configManager;

  public ?array $data = [];

  public function render()
  {
    return view('livewire.filament.mail-providers');
  }

  public function boot(ConfigManager $configManager): void
  {
    $this->configManager = $configManager;
  }

  public function mount(): void
  {
    $this->form->fill([
      'default_email_provider' => $this->configManager->get('mail.default'),
      'default_email_from_name' => $this->configManager->get('mail.from.name'),
      'default_email_from_email' => $this->configManager->get('mail.from.address'),
    ]);
  }

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make(__('Email Providers'))
          ->schema([
            Select::make('default_email_provider')
              ->label('Default Email Provider')
              ->options([
                'smtp' => 'SMTP',
                'mailgun' => 'Mailgun',
                'ses' => 'Amazon SES',
                'postmark' => 'Postmark',
              ])
              ->helperText(__('This is the email provider that will be used for all emails.')),
            TextInput::make('default_email_from_name')
              ->label('Default Email From Name')
              ->helperText(__('This is the name that will appear as the sender of all emails.')),
            TextInput::make('default_email_from_email')
              ->label('Default Email From Email')
              ->helperText(__('This is the email address that will appear as the sender of all emails.'))
              ->email(),
          ])->columns(3),
      ])
      ->statePath('data');
  }

  public function save()
  {
    $data = $this->form->getState();


    $this->configManager->set('mail.default', $data['default_email_provider']);
    $this->configManager->set('mail.from.name', $data['default_email_from_name']);
    $this->configManager->set('mail.from.address', $data['default_email_from_email']);

    Notification::make()
      ->title(__('Settings Saved'))
      ->success()
      ->send();
  }
}
