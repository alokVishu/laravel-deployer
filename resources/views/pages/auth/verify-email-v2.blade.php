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
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
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

            <h3 class="mb-1.5">{{ __('Verify your email') }}</h3>
            <div class="text-regular mb-6">An activation link has been sent to your email address.
              Please check your inbox and click on the link to complete the activation process.</div>

            <div class="mb-0">
              <div>
                <button class="btn btn-primary w-full" type="submit">{{ __('Skip for now') }}</button>
                <div class="text-center my-4 flex flex-wrap justify-center gap-2">
                  <div>{{ __('Didn\'t get the mail?') }}</div>
                  <button type="submit" class="text-primary whitespace-nowrap">{{ __('Resend') }}</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layouts.blank>
