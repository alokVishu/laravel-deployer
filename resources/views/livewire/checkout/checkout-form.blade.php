@if (config('app.payment_provider') === 'stripe')
  @push('head')
    <script src="https://js.stripe.com/v3/"></script>
  @endpush

  @push('scripts')
    <script>
      const stripe = Stripe(
        @json(config('app.stripe_publishable_key'))
      );

      const priceId = @js($priceId);
      const couponId = @js($couponId);
      const paymentMode = @js($paymentMode);

      async function checkout() {
        const fetchClientSecret = async () => {
          const response = await fetch("{{ route('products.checkout.stripesecret') }}", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'x-csrf-token': @json(csrf_token()),
            },
            body: JSON.stringify({
              price_id: priceId,
              mode: paymentMode,
            })
          });

          return response.text();
        };

        const checkout = await stripe.initEmbeddedCheckout({
          fetchClientSecret,
        });

        // Mount Checkout
        checkout.mount('#checkout');
      }
    </script>
  @endpush
@endif
@if (config('app.payment_provider') === 'lemonsqueezy')
  @push('head')
    <script src="https://app.lemonsqueezy.com/js/lemon.js" defer></script>
  @endpush

  @push('scripts')
    <script>
      const priceId = @js($priceId);
      const couponId = @js($couponId);

      const fetchUrl = async () => {
        const response = await fetch("{{ route('products.checkout-lemonsqueezy') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'x-csrf-token': @json(csrf_token()),
          },
          body: JSON.stringify({
            price_id: priceId,
            coupon_id: couponId,
          })
        });

        return await response.text();
      }

      const checkout = async () => {
        const checkoutUrl = await fetchUrl();
        LemonSqueezy.Url.Open(checkoutUrl);
      };
    </script>
  @endpush
@endif

{{-- commin script for both payment provider --}}
@push('scripts')
  <script>
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
      // Select the button element by its ID
      const button = document.getElementById('checkoutButton');

      // Add a click event listener to the button
      button.addEventListener('click', function() {
        checkout();
      });
    });
  </script>
@endpush


<div x-data="{ showModal: false }">
  <div>
    {{-- show form for login user --}}
    @guest
      <h2 class="text-3xl">{{ __('Enter Your Details') }}</h2>

      <div class="relative rounded-2xl border border-natural-300 mt-4 overflow-hidden p-6">

        <div class="absolute top-0 right-0 p-2">
          <span wire:loading>
            <span class="loading loading-spinner loading-xs"></span>
          </span>
        </div>


        <label class="form-control w-full" for="email">
          <div class="label">
            <span class="label-text">{{ __('Email Address') }}</span>
          </div>
          <input type="email" class="input input-bordered input-md w-full" name="email" required id="email"
            wire:model.blur="email" value="{{ old('email') }}">

        </label>

        @error('email')
          <span class="text-xs text-red-500" role="alert">
            {{ $message }}
          </span>
        @enderror

        @if (!empty($email))
          <label class="form-control w-full" for="password">
            <div class="label">
              <span class="label-text">{{ __('Password') }}</span>
            </div>
            <input type="password" class="input input-bordered input-md w-full" name="password" required id="password"
              wire:model.blur="password">
          </label>


          @error('password')
            <span class="text-xs text-red-500 ms-1" role="alert">
              {{ $message }}
            </span>
          @enderror
        @endif

        @if ($userExists)
          <div class="mt-2 ms-1 text-xs text-neutral-400">
            {{ __('You are already registered, enter your password.') }}</div>
        @elseif(!empty($email))
          <div class="mt-2 ms-1 text-xs text-neutral-400">{{ __('Enter a password for your new account.') }}
          </div>
        @endif

        @if ($userExists)
          @if (Route::has('password.request'))
            <div class="text-end">
              <a class="text-primary text-xs" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
            </div>
          @endif
        @endif

        @if (!$userExists || empty($email))
          <label class="form-control w-full" for="name">
            <div class="label">
              <span class="label-text">{{ __('Your Name') }}</span>
            </div>
            <input type="text" class="input input-bordered input-md w-full" name="name" required id="name"
              wire:model.blur="name" value="{{ old('name') }}">
          </label>

          @error('name')
            <span class="text-xs text-red-500" role="alert">
              {{ $message }}
            </span>
          @enderror
        @endif

        @if ($userExists && !empty($password))
          <button class="btn btn-primary mt-4" wire:click="loginUser">
            {{ __('Login') }}
          </button>
        @endif

        @if (!$userExists && !empty($email) && !empty($password) && !empty($name))
          <button class="btn btn-primary mt-4" wire:click="registerUser">
            {{ __('Register') }}
          </button>
        @endif
      </div>
    @endguest
  </div>
  <div>
    Pay with
    {{ config('app.payment_provider') }}

    <div>
      {{-- we have to use two button for checkout because we have usig alpine function to trigger model --}}
      @if (config('app.payment_provider') === 'stripe')
        <button class="border border-red-500 rounded px-3 text-red-500" id="checkoutButton" @click="showModal = true">
          Pay Now
        </button>
      @else
        <button class="border border-red-500 rounded px-3 text-red-500" id="checkoutButton">
          Pay Now
        </button>
      @endif
    </div>
  </div>

  {{-- checkout modal for stripe --}}
  <div>
    <div x-show="showModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full ">
      <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
          <div id="checkout" @click.outside="showModal = !showModal">

          </div>
        </div>
      </div>
    </div>
  </div>


</div>
