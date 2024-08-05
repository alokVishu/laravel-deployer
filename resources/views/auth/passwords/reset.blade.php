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
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <div class="mb-6">
              <a class="link text-base-content/90 link-neutral text-xl font-semibold no-underline"
                href="{{ url('/') }}">
                <x-layouts.partials.logo></x-layouts.partials.logo>
              </a>
            </div>

            <h3 class="mb-1.5">Reset Password</h3>
            <div class="text-regular mb-6">Please enter your current password and choose a new password to update your
              account security.</div>

            <label class="form-control w-full mb-4">
              <div class="label">
                <span class="label-text">{{ __('Email address*') }}</span>
              </div>
              <input id="email" type="email" placeholder="Enter your email address"
                class="input input-bordered w-full @error('email') is-invalid @enderror" name="email" required
                value="{{ $email ?? old('email') }}" autocomplete="email" autofocus />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </label>
            <label class="mb-4">
              <div class="label">
                <span class="label-text">{{ __('New Password') }}</span>
              </div>
              <div class="input-group">
                <input id="password" name="pasword" type="password"
                  class="input w-full @error('password') is-invalid @enderror" placeholder="························"
                  autocomplete="new-password" required />

                <span class="input-group-text">
                  <button type="button"
                    data-toggle-password='{
                      "target": "#toggle-password-label"
                    }'
                    class="block">
                    <span
                      class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-4 flex-shrink-0"></span>
                    <span
                      class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-4 flex-shrink-0"></span>
                  </button>
                </span>

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </label>

            <label class="mb-4">
              <div class="label">
                <span class="label-text">{{ __('Confirm Password') }}</span>
              </div>
              <div class="input-group">
                <input id="password-confirm" name="pasword_confirmation" type="password"
                  class="input w-full @error('password_confirmation') is-invalid @enderror"
                  placeholder="························" required autocomplete="new-password" />

                <span class="input-group-text">
                  <button type="button"
                    data-toggle-password='{
                      "target": "#toggle-password-label"
                    }'
                    class="block">
                    <span
                      class="icon-[tabler--eye] text-base-content/80 password-active:block hidden size-4 flex-shrink-0"></span>
                    <span
                      class="icon-[tabler--eye-off] text-base-content/80 password-active:hidden block size-4 flex-shrink-0"></span>
                  </button>
                </span>
              </div>
            </label>

            <div class="my-4">
              <button class="btn btn-primary w-full" type="submit">{{ __('Set new password') }}</button>

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
</x-layouts.blank>
