@php
  $bgImgSrc = URL::asset('images/pages/auth-pages-bg.png');
@endphp

<x-layouts.blank>
  <div class="flex min-h-screen">
    <div class="basis-0 lg:basis-2/3 bg-no-repeat bg-cover bg-center"
      style="background-image: url('{{ $bgImgSrc }}');">
      <div class="bg-no-repeat bg-center min-h-screen flex items-center justify-center"
        style="background-image: url({{ asset('images/pages/bg-shape.svg') }})">
        <img src="{{ asset('images/pages/auth-dashboard.png') }}" alt="hero" class="mx-auto" />
      </div>
    </div>
    <div class="basis-full lg:basis-1/3 bg-card">
      <div class="min-h-screen flex flex-col pt-14">
        <div class="flex flex-col justify-self-start grow w-4/5 md:w-1/2 lg:w-4/5 mx-auto">
          <a href="{{ url('/') }}" class="flex items-center gap-2">
            @svg('tabler-chevron-left', 'w-6 h-6 inline-block')
            Back to the website
          </a>
        </div>

        <div class="w-4/5 md:w-1/2 lg:w-4/5 mx-auto grow justify-self-center">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            @if (session('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="mb-6">
              <a class="link text-base-content/90 link-neutral text-xl font-semibold no-underline"
                href="{{ url('/') }}">
                <x-layouts.partials.logo></x-layouts.partials.logo>
              </a>
            </div>

            <h3 class="mb-1.5">Register to JetShip</h3>
            <div class="text-regular mb-6">Ship Faster and Focus on Growth.</div>

            @if (config('app.oauth_login_providers.magic_link'))
              <div>
                Login with
                <a href="/auth/passwordless" class="text-primary">Magic Link</a>
              </div>
            @endif

            <label class="form-control w-full mb-4">
              <div class="label">
                <span class="label-text">{{ __('Username*') }}</span>
              </div>
              <input id="name" type="text" placeholder="Enter your username"
                class="input input-bordered w-full @error('name') is-invalid @enderror" name="name" required
                autocomplete="name" autofocus />
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </label>


            <label class="form-control w-full mb-4">
              <div class="label">
                <span class="label-text">{{ __('Email address*') }}</span>
              </div>
              <input id="email" type="email" placeholder="Enter your email address"
                class="input input-bordered w-full @error('email') is-invalid @enderror" name="email" required
                autocomplete="email" autofocus x-model="email" />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </label>

            <label class="form-control w-full mb-4">
              <div class="label">
                <span class="label-text">{{ __('Password*') }}</span>
              </div>
              <input id="password" type="password" placeholder="················"
                class="input input-bordered w-full @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password" name="password" required autocomplete="new-password" />
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </label>

            <label class="form-control w-full mb-2">
              <div class="label">
                <span class="label-text">{{ __('Confirm Password*') }}</span>
              </div>
              <input id="password-confirm" type="password" placeholder="················"
                class="input input-bordered w-full @error('password') is-invalid @enderror" name="password_confirmation"
                autocomplete="new-password" />

            </label>

            <div class="mb-2">
              <div class="form-control">
                <label class="label cursor-pointer gap-2 items-center whitespace-nowrap flex-wrap">
                  <div class="flex gap-2 items-center">
                    <input type="checkbox" name="remember" id="remember" class="checkbox" />
                    <span class="text-regular text-base-content/90">{{ __('I agree to ') }}</span>

                    <a href="" class="text-primary-500">privacy policy & terms</a>
                  </div>

                </label>
              </div>
            </div>

            @if (config('app.recaptcha_enabled'))
              <div class="my-4">
                {!! htmlFormSnippet() !!}
              </div>
              @error('g-recaptcha-response')
                <span class="text-xs text-red-500" role="alert">
                  {{ $message }}
                </span>
              @enderror
              @push('head')
                {!! htmlScriptTagJsApi() !!}
              @endpush
            @endif

            <div class="mb-0">
              <div>
                <button class="btn btn-primary w-full" type="submit">{{ __('Sign in to JetShip') }}</button>
                <div class="text-center my-4 flex flex-wrap justify-center gap-2">
                  <div>Already have an account?</div>
                  <a href="/login" class="text-primary-500 whitespace-nowrap">{{ __('Sign in Instead') }}</a>
                </div>
              </div>
            </div>
          </form>

          <x-auth.social-login>
            <x-slot name="before">
              <div class="flex flex-col w-full">
                <div class="divider text-base-content/90">{{ __('or') }}</div>
              </div>
            </x-slot>
          </x-auth.social-login>
        </div>

      </div>

    </div>
  </div>
</x-layouts.blank>
