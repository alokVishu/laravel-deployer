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
    </div>
  </div>
</x-layouts.blank>
