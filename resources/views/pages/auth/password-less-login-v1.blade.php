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
              <form action="" method="POST">
                @csrf

                @if (session('message'))
                  <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if (session('status'))
                  <div class="alert alert-success"> {{ session('status') }}</div>
                @endif

                <div class="mb-6">
                  <a class="link text-base-content/90 link-neutral text-xl font-semibold no-underline"
                    href="{{ url('/') }}">
                    <x-layouts.partials.logo></x-layouts.partials.logo>
                  </a>
                </div>

                <h3 class="mb-1.5">Magic Link</h3>
                <div class="text-regular mb-6">Please enter your email for the magic link.</div>


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

                <button class="btn btn-primary w-full mb-4" type="submit">{{ __('Send a magic link') }}</button>

                <button class="btn w-full mb-4" type="submit">{{ __('Don\'t have an account yet?') }}</button>

              </form>

              <div class="text-center flex flex-wrap justify-center gap-2">
                <div>Access your account with</div>
                <a href="/login" class="text-primary whitespace-nowrap">{{ __('Password') }}</a>
              </div>

              <x-auth.social-login>
                <x-slot name="before">
                  <div class="flex flex-col w-full">
                    <div class="divider">{{ __('or') }}</div>
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
