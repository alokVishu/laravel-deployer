@props(['before' => ''])

<div {{ $attributes->merge(['class' => '']) }}>

  @if (count(config('app.oauth_login_providers')) > 0)
    {{ $before }}
  @endif

  <div class="flex gap-2 justify-center">
    @if (config('app.oauth_login_providers.google'))
      <a href="{{ route('auth.oauth.redirect', 'google') }}">
        <button class="btn btn-ghost btn-circle">
          <img src="{{ asset('images/icons/auth-providers/google.png') }}" alt="Google">
        </button>
      </a>
    @endif
    @if (config('app.oauth_login_providers.facebook'))
      <a href="{{ route('auth.oauth.redirect', 'facebook') }}">
        <button class="btn btn-ghost btn-circle">
          <img src="{{ asset('images/icons/auth-providers/fb.png') }}" alt="Facebook">
        </button>
      </a>
    @endif
    @if (config('app.oauth_login_providers.github'))
      <a href="{{ route('auth.oauth.redirect', 'github') }}">
        <button class="btn btn-ghost btn-circle">
          <img src="{{ asset('images/icons/auth-providers/github.png') }}" alt="Github">
        </button>
      </a>
    @endif
    @if (config('app.oauth_login_providers.twitter'))
      <a href="{{ route('auth.oauth.redirect', 'twitter') }}">
        <button class="btn btn-ghost btn-circle">
          <img src="{{ asset('images/icons/auth-providers/twitter-logo.png') }}" alt="Twitter">
        </button>
      </a>
    @endif
  </div>
</div>
