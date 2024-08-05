<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth h-full enhanced-scrollbar">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  @include('components.layouts.partials.social-cards')

  @php($description = isset($description) ? $description : config('app.description'))
  <meta name="description" content="{{ $description }}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Page Title' }}</title>

  @stack('head')

  @vite(['resources/scss/app.scss', 'resources/js/app.js'])

  {{-- share this --}}
  @if (config('app.share_this_enabled'))
    <script type="text/javascript"
      src="https://platform-api.sharethis.com/js/sharethis.js#property={{ config('app.share_this_property_id') }}&product=sop"
      async="async"></script>
  @endif
</head>

<body class="min-h-screen text-base-content/80">
  <div id="app" class="flex flex-col flex-grow h-dvh">
    {{-- navbar --}}
    <x-layouts.components.navbar></x-layouts.components.navbar>

    {{-- main page content --}}
    <div class="flex-grow">
      {{ $slot }}
    </div>

    {{-- footer --}}
    <x-layouts.components.footer></x-layouts.components.footer>
    <x-impersonate::banner />
  </div>

  {{-- This is a code snippt for injecting analytics providers script. --}}
  @if (!empty(config('app.analytics_providers')))
    @foreach (json_decode(config('app.analytics_providers')) as $provider)
      {!! $provider->snippet !!}
    @endforeach
  @endif

  @if (json_decode(config('app.chatbot_code_snippet')))
    {!! config('app.chatbot_code_snippet') !!}
  @endif

  <!-- Stack for pushing scripts to the tail (bottom of the body) -->
  @stack('scripts')
</body>

</html>
