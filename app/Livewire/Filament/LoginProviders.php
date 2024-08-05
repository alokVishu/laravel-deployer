<?php

namespace App\Livewire\Filament;

use App\Services\ConfigManager;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use ValentinMorice\FilamentJsonColumn\FilamentJsonColumn;

class LoginProviders extends Component implements HasForms
{

  use InteractsWithForms;

  private ConfigManager $configManager;

  public ?array $data = [];

  public function boot(ConfigManager $configManager): void
  {
    $this->configManager = $configManager;
  }

  public function render()
  {
    return view('livewire.filament.login-providers');
  }

  public function mount(): void
  {
    $this->form->fill([
      'google' => $this->configManager->get('app.oauth_login_providers.google', false),
      'facebook' => $this->configManager->get('app.oauth_login_providers.facebook', false),
      'github' => $this->configManager->get('app.oauth_login_providers.github', false),
      'twitter' => $this->configManager->get('app.oauth_login_providers.twitter', false),
      'magic_link' => $this->configManager->get('app.oauth_login_providers.magic_link', false),

    ]);
  }

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make(__('Login Providers'))

          ->schema([
            Toggle::make('google')->label('Google')
              ->helperText(__('If enabled, customers will be able to login using direct gmail account.')),
            Toggle::make('facebook')->label('Facebook')
              ->helperText(__('If enabled, customers will be able to login using direct facebook account.')),
            Toggle::make('github')->label('GitHub')
              ->helperText(__('If enabled, customers will be able to login using direct github account.')),
            Toggle::make('twitter')->label('Twitter')
              ->helperText(__('If enabled, customers will be able to login using direct twitter account.')),
            Toggle::make('magic_link')->label('Magic Link')
              ->helperText(__('If enabled, customers will be able to login using link provided in email account.')),
          ]),
      ])
      ->statePath('data');
  }

  public function save()
  {
    $data = $this->form->getState();

    $this->configManager->set('app.oauth_login_providers.google', $data['google']);
    $this->configManager->set('app.oauth_login_providers.facebook', $data['facebook']);
    $this->configManager->set('app.oauth_login_providers.github', $data['github']);
    $this->configManager->set('app.oauth_login_providers.twitter', $data['twitter']);
    $this->configManager->set('app.oauth_login_providers.magic_link', $data['magic_link']);


    Notification::make()
      ->title(__('Settings Saved'))
      ->success()
      ->send();
  }
}
