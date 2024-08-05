<?php

namespace App\Livewire\Filament;

use App\Services\ConfigManager;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Faker\Provider\ar_EG\Text;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class GeneralSettings extends Component implements HasForms
{
  use InteractsWithForms;

  private ConfigManager $configManager;

  public ?array $data = [];

  public function render()
  {
    return view('livewire.filament.general-settings');
  }

  public function boot(ConfigManager $configManager): void
  {
    $this->configManager = $configManager;
  }

  public function mount(): void
  {
    $this->form->fill([
      'site_name' => $this->configManager->get('app.name'),
      'description' => $this->configManager->get('app.description'),
      'support_email' => $this->configManager->get('app.support_email'),
      'date_format' => $this->configManager->get('app.date_format'),
      'datetime_format' => $this->configManager->get('app.datetime_format'),
      'analytics_providers' => json_decode($this->configManager->get('app.analytics_providers'), true),
      'social_links' => json_decode($this->configManager->get('app.social_links'), true),
      'roadmap_enabled' => $this->configManager->get('app.roadmap_enabled', true),
      'blog_enabled' => $this->configManager->get('app.blog_enabled', true),
      'newsletter_enabled' => $this->configManager->get('app.newsletter_enabled', true),
      'chatbot_code_snippet' => json_decode($this->configManager->get('app.chatbot_code_snippet'), true),
      'share_this_property_id' => $this->configManager->get('app.share_this_property_id'),
      'share_this_enabled' => $this->configManager->get('app.share_this_enabled', false),
      'recaptcha_enabled' => $this->configManager->get('app.recaptcha_enabled', false),
      'recaptcha_api_site_key' => $this->configManager->get('recaptcha.api_site_key', ''),
      'recaptcha_api_secret_key' => $this->configManager->get('recaptcha.api_secret_key', ''),
    ]);
  }

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Tabs::make()->tabs([
          Tabs\Tab::make(__('Application'))
            ->icon('tabler-world')
            ->schema([
              TextInput::make('site_name')
                ->label(__('Site Name'))
                ->required(),

              TextInput::make('support_email')
                ->label(__('Support Email'))
                ->required()
                ->email(),
              TextInput::make('date_format')
                ->label(__('Date Format'))
                ->rules([
                  function () {
                    return function (string $attribute, $value, \Closure $fail) {
                      // make sure that the date format is valid
                      $timestamp = strtotime('2021-01-01');
                      $date = date($value, $timestamp);

                      if ($date === false) {
                        $fail(__('The :attribute is invalid.'));
                      }
                    };
                  },
                ])
                ->required(),
              TextInput::make('datetime_format')
                ->label(__('Date Time Format'))
                ->rules([
                  function () {
                    return function (string $attribute, $value, \Closure $fail) {
                      // make sure that the date format is valid
                      $timestamp = strtotime('2021-01-01 00:00:00');
                      $date = date($value, $timestamp);

                      if ($date === false) {
                        $fail(__('The :attribute is invalid.'));
                      }
                    };
                  },
                ])
                ->required(),
              Textarea::make('description')
                ->helperText(__('This will be used as the meta description for your site (for pages that have no description).'))
                ->columnSpan('full'),
            ])->columns(2),
          Tabs\Tab::make(__('Analytics'))
            ->icon('tabler-category-2')
            ->schema([
              TableRepeater::make('analytics_providers')
                ->headers([
                  Header::make('name'),
                  Header::make('snippet'),
                ])
                ->schema([
                  TextInput::make('name'),
                  Textarea::make('snippet'),
                ]),
            ]),
          Tabs\Tab::make(__('Social Links'))
            ->icon('tabler-heart')
            ->schema([
              TableRepeater::make('social_links')
                ->headers([
                  Header::make('title'),
                  Header::make('url'),
                ])
                ->schema([
                  TextInput::make('title'),
                  TextInput::make('url'),
                ]),
            ]),
          Tabs\Tab::make(__('ChatBots'))
            ->icon('tabler-message-2')
            ->schema([
              Textarea::make('chatbot_code_snippet')
                ->label(__('Chatbot Code Snippet'))
                ->helperText(__('Paste your chatbot\'s code snippet here.')),
            ]),
          Tabs\Tab::make(__('Pages & Components'))
            ->icon('tabler-adjustments')
            ->schema([
              Toggle::make('roadmap_enabled')
                ->label(__('Roadmap Enabled'))
                ->helperText(__('If enabled, the roadmap will be visible to the public.'))
                ->required(),
              Toggle::make('blog_enabled')
                ->label(__('Blog Enabled'))
                ->helperText(__('If enabled, the blog will be visible to the public.'))
                ->required(),
              Toggle::make('newsletter_enabled')
                ->label(__('Newsletter Enabled'))
                ->helperText(__('If enabled, the newsletter component will be visible to the public.'))
                ->required(),
            ]),

          Tabs\Tab::make(__('Share This (Blog)'))
            ->icon('tabler-share')
            ->schema([
              TextInput::make('share_this_property_id')
                ->label(__('Share This Property ID'))
                ->helperText(__('The property ID provided by Share This.'))
                ->columnSpan(1),
              Toggle::make('share_this_enabled')
                ->label(__('Share This Enabled'))
                ->helperText(__('If enabled, the Share This widget will be visible on the blog.'))
                ->required()
                ->columnSpan('full'),
            ])->columns(3),

          Tabs\Tab::make(__('Recaptcha'))
            ->icon('heroicon-o-shield-check')
            ->schema([
              Toggle::make('recaptcha_enabled')
                ->label(__('Recaptcha Enabled'))
                ->helperText(new HtmlString(__('If enabled, recaptcha will be used on the registration & login forms. For more info on how to configure Recaptcha, see the <a class="text-primary-500" href=":url" target="_blank">documentation</a>.', ['url' => 'https://jetship.test/docs/recaptcha'])))
                ->required(),
              TextInput::make('recaptcha_api_site_key')
                ->label(__('Recaptcha Site Key')),
              TextInput::make('recaptcha_api_secret_key')
                ->label(__('Recaptcha Secret Key')),
            ]),
        ])
          ->persistTabInQueryString('settings-tab'),
      ])
      ->statePath('data');
  }

  public function save(): void
  {
    $data = $this->form->getState();


    $this->configManager->set('app.name', $data['site_name']);
    $this->configManager->set('app.description', $data['description']);
    $this->configManager->set('app.support_email', $data['support_email']);
    $this->configManager->set('app.date_format', $data['date_format']);
    $this->configManager->set('app.datetime_format', $data['datetime_format']);
    $this->configManager->set('app.analytics_providers', json_encode($data['analytics_providers']));
    $this->configManager->set('app.social_links', json_encode($data['social_links']));
    $this->configManager->set('app.roadmap_enabled', $data['roadmap_enabled']);
    $this->configManager->set('app.blog_enabled', $data['blog_enabled']);
    $this->configManager->set('app.newsletter_enabled', $data['newsletter_enabled']);
    $this->configManager->set('app.chatbot_code_snippet', json_encode($data['chatbot_code_snippet']));
    $this->configManager->set('app.share_this_property_id', $data['share_this_property_id']);
    $this->configManager->set('app.share_this_enabled', $data['share_this_enabled']);
    $this->configManager->set('app.recaptcha_enabled', $data['recaptcha_enabled']);
    $this->configManager->set('recaptcha.api_site_key', $data['recaptcha_api_site_key']);
    $this->configManager->set('recaptcha.api_secret_key', $data['recaptcha_api_secret_key']);

    Notification::make()
      ->title(__('Settings Saved'))
      ->success()
      ->send();
  }
}
