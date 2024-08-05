@php
  $bgImgSrc = URL::asset('images/pages/auth-pages-bg-v1.png');
@endphp

@push('head')
  <style>
    .bg-shape-img {
      background-image: none;
    }

    @media (min-width: 768px) {
      .bg-shape-img {
        background-image: url({{ asset('images/pages/bg-shape.svg') }});
      }
    }
  </style>
@endpush

<x-layouts.blank>
  <div class="min-h-screen">
    <div class="bg-no-repeat bg-cover bg-center" style="background-image: url('{{ $bgImgSrc }}');">
      <div class="bg-no-repeat bg-center min-h-screen bg-shape-img">
        <div class="min-h-screen flex items-center justify-center px-4">
          <div class="card bg-card max-w-[430px] grow">
            <div class="card-body p-5 sm:p-8">
              <form method="POST" action="">
                @csrf
                @if (session('message'))
                  <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @if (session('status'))
                  <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="mb-4 sm:mb-6">
                  <a class="link text-base-content/90 link-neutral text-xl font-semibold no-underline"
                    href="{{ url('/') }}">
                    <x-layouts.partials.logo></x-layouts.partials.logo>
                  </a>
                </div>

                <h3 class="mb-1.5">Sign in to JetShip</h3>
                <div class="text-regular sm:mb-6 mb-4">Ship Faster and Focus on Growth.</div>

                @if (config('app.oauth_login_providers.magic_link'))
                  <div>
                    Login with
                    <a href="/auth/passwordless" class="text-primary">Magic Link</a>
                  </div>
                @endif

                {{-- Toggle switch for entering temp password --}}
                <div class="my-4 sm:my-6 flex gap-4 sm:gap-6 flex-wrap">
                  <button type="button" class="btn btn-sm btn-outline btn-primary rounded-md grow"
                    x-on:click="email='user@user.com'; password='user'">Login as User</button>
                  <button type="button" class="btn btn-sm btn-outline btn-primary rounded-md grow"
                    x-on:click="email='admin@admin.com'; password='admin'">Login as Admin</button>
                </div>

                <label class="form-control w-full mb-4">
                  <div class="label">
                    <span class="label-text">{{ __('Email address*') }}</span>
                  </div>
                  <input id="email" type="email" placeholder="Enter your email address"
                    class="input input-bordered w-full @error('email') is-invalid @enderror" name="email" required
                    autocomplete="email" autofocus />
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </label>

                <label class="form-control w-full mb-2">
                  <div class="label">
                    <span class="label-text">{{ __('Password*') }}</span>
                  </div>
                  <input id="password" type="password" placeholder="················"
                    class="input input-bordered w-full @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" autofocus />
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </label>

                <div class="mb-2">
                  <div class="form-control">
                    <label class="label cursor-pointer gap-2 items-center whitespace-nowrap flex-wrap">
                      <div class="flex gap-2 items-center">
                        <input type="checkbox" name="remember" id="remember" class="checkbox" />
                        <span class="text-regular text-base-content/90">{{ __('Remember Me') }}</span>
                      </div>
                      @if (Route::has('password.request'))
                        <a class="text-primary" href="{{ route('password.request') }}">
                          {{ __('Forgot Password?') }}
                        </a>
                      @endif
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
                    <div class="text-center mt-4 flex flex-wrap justify-center gap-2">
                      <div>New on our platform?</div>
                      <a href="/register" class="text-primary whitespace-nowrap">{{ __('Create an account') }}</a>
                    </div>
                  </div>
                </div>
              </form>

              <x-auth.social-login>
                <x-slot name="before">
                  <div class="flex flex-col w-full">
                    <div class="divider mt-2 mb-4 text-base">{{ __('or') }}</div>
                  </div>
                </x-slot>
              </x-auth.social-login>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.blank>
