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
          <form method="POST" action="{{ route('waitlist.index') }}">
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

            <h3 class="mb-1.5">Get early access!</h3>
            <div class="text-regular mb-6">Join the waitlist for the best SaaS Laravel Boilerplate.</div>

            {{-- Name --}}
            <label class="form-control w-full mb-4">
              <div class="label">
                <span class="label-text">{{ __('Name') }}</span>
              </div>
              <input id="name" type="name" placeholder="Enter your name"
                class="input input-bordered w-full @error('email') is-invalid @enderror" name="name" required
                autocomplete="name" autofocus />
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </label>

            {{-- Email --}}
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

            <div class="mb-6">
              <button class="btn btn-primary w-full" type="submit">{{ __('Join the wishlist') }}</button>
            </div>

          </form>

          <p class="text-center my-6">
            This website is fully made using JetShip. <br>
            ©2024 JetShip. All rights reserved.
          </p>

          {{-- social buttons --}}
          <div>
            {{-- This is code snippet for injecting social networks in footer --}}
            @if (!empty(config('app.social_links')))
              <div class="flex justify-center flex-wrap gap-2">
                @foreach (json_decode(config('app.social_links')) as $socialNetwork)
                  @if (!empty($socialNetwork->url))
                    <x-btn.social-btn :socialNetwork="$socialNetwork"></x-btn.social-btn>
                  @endif
                @endforeach
              </div>
            @endif
          </div>

          {{-- Waitlist Sucessfull Modal temporary --}}
          {{-- <div class="card bg-card shadow-xl text-center">
            <div class="card-body">
              <div class="flex justify-center mb-6">
                <div
                  class="w-[4.25rem] h-[4.25rem] flex items-center justify-center border border-primary/30 rounded-full">
                  <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                    @svg('tabler-check', 'w-8 h-8 text-white')
                  </div>
                </div>
              </div>

              <h3 class="mb-2">We’ve added you to our
                waiting list!</h3>
              <p class="mb-6">We’ll let you know when JetShip is ready.</p>
              <p>JetShip is coming soon.Designed by @themeselection to give you back your time.</p>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</x-layouts.blank>
