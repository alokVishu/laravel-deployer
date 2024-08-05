<meta name="twitter:title" content="{{ config('app.name', 'JetShip') }}" />
<meta name="twitter:description" content="{{ config('app.description', 'JetShip') }}" />

@if (config('open-graphy.enabled', false) && !request()->routeIs('home'))
  <x-open-graphy::links title="{{ config('app.name', 'JetShip') }}" />
@else
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:image" content="{{ asset('images/twitter-card.png') }}" />
  <meta property="og:image" content="{{ asset('images/facebook-card.png') }}" />
@endif

<meta property="og:title" content="{{ config('app.name', 'JetShip') }}" />
<meta property="og:url" content="{{ route('home') }}" />

<meta property="og:description" content="{{ config('app.description', 'JetShip') }}" />
