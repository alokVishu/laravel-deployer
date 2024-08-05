  <footer class="bg-card">
    <div class="container mx-auto py-[60px]">
      <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        {{-- about jetship --}}
        <div class="col-span-2">
          <a href="{{ url('/') }}" class="block mb-6">
            <x-layouts.partials.logo></x-layouts.partials.logo>
          </a>

          <p class="mb-6">
            {{ __('This website is fully made using JetShip.') }}
            <br>
            {{ __('©2024 JetShip. All rights reserved.') }}
          </p>

          <p class="flex items-center flex-wrap gap-1 mb-6">
            <span class="flex gap-1">{{ __('Crafted with') }} @svg('tabler-heart-filled', 'text-error') {{ __('by') }}</span>
            <span class="text-primary font-semibold">{{ __('ThemeSelection') }}</span>
          </p>

          {{-- social buttons --}}
          <div>
            {{-- This is code snippet for injecting social networks in footer --}}
            @if (!empty(config('app.social_links')))
              <div class="flex items-center flex-wrap gap-2">
                @foreach (json_decode(config('app.social_links')) as $socialNetwork)
                  @if (!empty($socialNetwork->url))
                    <x-btn.social-btn :socialNetwork="$socialNetwork"></x-btn.social-btn>
                  @endif
                @endforeach
              </div>
            @endif
          </div>
        </div>

        {{-- about --}}
        <div>
          <ul>
            <li class="mb-4">
              <h6>{{ __('About') }}</h6>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Pricing') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('FAQs') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Reviews') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Showcase') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Upgrade') }}
              </x-link.simple-link>
            </li>
            <li>
              <x-link.simple-link href="#" target="blank">
                {{ __('Contact Us') }}
              </x-link.simple-link>
            </li>
          </ul>
        </div>

        {{-- resources --}}
        <div>
          <ul>
            <li class="mb-4">
              <h6>{{ __('Resources') }}</h6>
            </li>
            <li class="mb-4 text-base-content/90">
              <x-link.simple-link href="#" target="blank">
                {{ __('Check Demo') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Documentation') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Changelog') }}
              </x-link.simple-link>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Discord Community') }}
              </x-link.simple-link>
            </li>
            <li>
              <x-link.simple-link href="#" target="blank">
                {{ __('Blog') }}
              </x-link.simple-link>
            </li>
          </ul>
        </div>

        {{-- collaboration --}}
        <div>
          <ul>
            <li class="mb-4">
              <h6>{{ __('Collaboration') }}</h6>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('Affiliates (up to $75) per sale') }}
              </x-link.simple-link>
            </li>
            <li>
              <x-link.simple-link href="{{ route('roadmap') }}">
                {{ __('Roadmap') }}
              </x-link.simple-link>
            </li>
          </ul>
        </div>

        {{-- legal --}}
        <div>
          <ul>
            <li class="mb-4">
              <h6>{{ __('Legal') }}</h6>
            </li>
            <li class="mb-4">
              <x-link.simple-link href="#" target="blank">
                {{ __('License') }}
              </x-link.simple-link>
            </li>
            <li>
              <x-link.simple-link href="#" target="blank">
                {{ __('Privacy & Legal') }}
              </x-link.simple-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
