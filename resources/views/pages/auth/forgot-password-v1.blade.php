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
              <form method="POST" action="{{ route('password.email') }}">
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

                <h3 class="mb-1.5">Forgot Password?</h3>
                <div class="text-regular mb-6">Enter your email and we'll send you instructions
                  to reset your password.</div>

                <label class="form-control w-full mb-4">
                  <div class="label">
                    <span class="label-text">{{ __('Email address*') }}</span>
                  </div>
                  <input id="email" type="email" placeholder="Enter your email address"
                    class="input input-bordered w-full @error('email') is-invalid @enderror" name="email" required
                    value="{{ old('email') }}" autocomplete="email" autofocus />
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </label>

                <div class="my-4">
                  <button class="btn btn-primary w-full" type="submit">{{ __('Send Reset Link') }}</button>

                  <a href="/login" class="flex mt-4 gap-2 justify-center text-primary-500">
                    @svg('tabler-chevron-left', 'w-6 h-6')
                    <div>Back to login</div>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layouts.blank>
