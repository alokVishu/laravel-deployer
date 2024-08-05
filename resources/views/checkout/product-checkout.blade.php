<x-layouts.app>
  <div class="text-center my-4">
    <h6 class="text-primary">
      {{ __('Pay securely.') }}
    </h6>
    <h2>
      {{ __('Complete your purchase') }}
    </h2>
  </div>

  <div class="flex max-w-6xl mx-auto justify-between">


    <div>
      <livewire:checkout.checkout-form :product="$product" :priceId="$price_id" :couponId="$coupon_id" :paymentMode="$payment_mode" />
    </div>

    <div>
      <div class="md:sticky md:top-2">
        <h2 class="!text-xl">
          {{ __('Plan details') }}
        </h2>

        <div class="rounded-2xl border border-natural-300 mt-4 overflow-hidden p-6">

          <div class="flex flex-row gap-3">
            <div class="rounded-2xl text-5xl p-2 text-center w-24 h-24 text-primary justify-self-center self-center">

            </div>
            <div class="flex flex-col gap-1">
              <span class="text-xl font-semibold flex flex-row md:gap-2 flex-wrap">
                <span class="py-1">

                </span>
                {{-- @if ($plan->has_trial)
                                    <span class="text-xs font-normal rounded-full border border-primary text-primary px-2 md:px-4 py-1 inline-block self-center">
                                        {{ $plan->trial_interval_count }} {{ $plan->trialInterval()->firstOrFail()->name }} {{ __(' free trial included') }}
                                    </span>
                                @endif --}}
              </span>
              {{-- @if ($plan->interval_count > 1)
                                <span class="text-xs">{{ $plan->interval_count }} {{ ucfirst($plan->interval->name) }}</span>
                            @else
                                <span class="text-xs">{{ ucfirst($plan->interval->adverb) }} {{ __('subscription.') }}</span>
                            @endif --}}

              <span class="text-xs">
                {{ __('Starts immediately.') }}
              </span>

            </div>
          </div>

          <div class="my-4">
            {{ __('What you get:') }}
          </div>
          <div>
            <ul class="flex flex-col items-start gap-3">
              {{-- @if ($plan->product->features)
                                @foreach ($plan->product->features as $feature)
                                    <x-features.li-item>{{ $feature['feature'] }}</x-features.li-item>
                                @endforeach
                            @endif --}}
            </ul>
          </div>

          {{-- <livewire:checkout.subscription-totals :totals="$totals" :plan="$plan" page="{{request()->fullUrl()}}"/> --}}

        </div>
      </div>

    </div>

  </div>
</x-layouts.app>
