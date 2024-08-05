<div>
  @if (json_decode(Config::get('app.products')))
    @if ($currentProduct && $currentProduct->name)
      <x-filament::card>
        <h1 class="text-base font-medium mb-2">Your Plan</h1>
        <p class="text-sm mb-4">
          Below are the details of your current plan. You can change your plan or cancel your subscription at any time.
        </p>

        <hr class="my-4 border-gray-950/10 dark:border-white/15">

        <h2 class="text-lg font-medium flex items-center gap-2">
          @svg('tabler-circle-check', 'w-6 h-6 text-primary')
          {{ $currentProduct->name }}</h2>
        <p class="text-sm mt-1">{{ $currentProduct->description }}</p>

        <p class="text-sm font-bold mt-3">
          Details
        </p>

        <p class="text-sm">Billed {{ $currentProduct->interval }} - ${{ $currentProduct->price }}</p>

      </x-filament::card>
      <div class="my-6"></div>
      <x-filament::card>
        <h2 class="text-base font-medium mb-2">Manage your Billing Details</h2>
        <p class="text-sm">Visit your Billing Portal to manage your subscription and billing. You can update or cancel
          your
          plan, or
          download your invoices.</p>
        <x-filament::button wire:click="redirectToBillingPortal" class="mt-6">
          <div class="flex items-center gap-2">
            Visit billing portal
            @svg('tabler-arrow-right', 'w-4 h-4')
          </div>
        </x-filament::button>
      </x-filament::card>
    @else
      {{-- stripe and lemon squeezy --}}
      <x-filament::card>
        <h2 class="text-lg font-medium">Plans</h2>
        <p class="text-sm mb-4">
          Choose a plan that fits your team's needs. You can upgrade or downgrade your plan at any time.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <form action="{{ route('products.checkout') }}" method="POST">
              @csrf
              @if (!empty($intervals[0]))
                <div class="ring-1 ring-gray-950/10 dark:ring-white/15 rounded-xl p-4 mb-4">
                  <h6 class="text-base font-medium mb-3">Choose your billing interval</h6>

                  <div class="flex items-center flex-wrap gap-4">
                    @foreach ($intervals as $interval)
                      {{-- yearly --}}
                      <label for="{{ $interval }}"
                        class="flex items-center gap-2 py-2 px-3 rounded-xl ring-1 ring-gray-950/10 dark:ring-white/15 {{ $selectedInterval === $interval ? 'ring-primary' : '' }}">
                        <input id="{{ $interval }}" type="radio" name="interval" value="{{ $interval }}"
                          class="radio checked:bg-primary checked:hover:bg-primary checked:focus:bg-primary"
                          wire:click="setSelectedInterval('{{ $interval }}')"
                          {{ $selectedInterval === $interval ? 'checked' : '' }}>

                        <span class="text-sm font-medium">Billed {{ $interval }}</span>
                      </label>
                    @endforeach
                  </div>
                </div>
              @endif

              <h6 class="text-sm font-medium mb-3">Pick your preferred plan</h6>

              <div class="grid grid-cols-1">
                @foreach ($productsCollection as $product)
                  {{-- for oneoff product  --}}
                  @if (property_exists($product, 'oneoff'))
                    <h1 class="font-bold mb-1">
                      {{ $product->name }}
                    </h1>
                    <p class="text-sm mb-4">
                      {{ $product->description }}
                    </p>

                    @foreach ($product->prices as $productPrice)
                      <label
                        class="ring-1 ring-gray-950/10 dark:ring-white/15 rounded-xl p-3 mb-4 flex items-center justify-between
                   {{ $selectedPlanName === $productPrice->name ? 'ring-primary' : '' }}">
                        <div class="flex items-center gap-3">
                          <input id="{{ $productPrice->name }}" type="radio" name="plan"
                            value="{{ $productPrice->name }}"
                            wire:click="setSelectedPlan('{{ $productPrice->name }}')"
                            {{ $selectedPlanName === $productPrice->name ? 'checked' : '' }}
                            class="radio checked:bg-primary checked:hover:bg-primary checked:focus:bg-primary">

                          <div>
                            <h1 class="font-bold">{{ $productPrice->name }}</h1>
                            <p class="text-sm">{{ $productPrice->description }}</p>
                          </div>
                        </div>

                        <div class="text-end">
                          <h1 class="font-bold">
                            ${{ $this->getPrice($product, $productPrice->name) }}
                          </h1>
                          <span class="text-sm text-nowrap">Pay once</span>
                        </div>
                        <input type="hidden" value="{{ json_encode($product) }}" name="product">

                        @if (config('app.payment_provider') === 'stripe')
                          <input type="hidden"
                            name="{{ $selectedPlanName === $productPrice->name ? 'price_id' : '' }}"
                            value="{{ $productPrice->price_id }}">
                        @endif
                        @if (config('app.payment_provider') === 'lemonsqueezy')
                          <input type="hidden"
                            name="{{ $selectedPlanName === $productPrice->name ? 'price_id' : '' }}"
                            value="{{ $productPrice->price_id }}">
                        @endif
                      </label>
                    @endforeach
                  @else
                    {{-- for subscription base product --}}
                    <label
                      class="ring-1 ring-gray-950/10 dark:ring-white/15 rounded-xl p-3 mb-4 flex items-center justify-between
                   {{ $selectedPlanName === $product->name ? 'ring-primary' : '' }}">
                      <div class="flex items-center gap-3">
                        <input id="{{ $product->name }}" type="radio" name="plan" value="{{ $product->name }}"
                          wire:click="setSelectedPlan('{{ $product->name }}')"
                          {{ $selectedPlanName === $product->name ? 'checked' : '' }}
                          class="radio checked:bg-primary checked:hover:bg-primary checked:focus:bg-primary">

                        <div>
                          <h1 class="font-bold">{{ $product->name }}</h1>
                          <p class="text-sm">{{ $product->description }}</p>
                        </div>
                      </div>

                      <div class="text-end">
                        <h1 class="font-bold">
                          ${{ $this->getPrice($product, $selectedInterval) }}
                        </h1>
                        <span class="text-sm text-nowrap">per {{ $selectedInterval }}</span>
                      </div>
                      <input type="hidden" value="{{ json_encode($product) }}" name="product">

                      @if (config('app.payment_provider') === 'stripe')
                        <input type="hidden" name="{{ $selectedPlanName === $product->name ? 'price_id' : '' }}"
                          value="{{ $this->getPriceId() }}">
                      @endif
                      @if (config('app.payment_provider') === 'lemonsqueezy')
                        <input type="hidden" name="{{ $selectedPlanName === $product->name ? 'price_id' : '' }}"
                          value="{{ $this->getPriceId() }}">
                      @endif
                    </label>
                  @endif
                @endforeach
              </div>

              @if (config('app.payment_provider') === 'stripe')
                <input type="hidden" name="coupon_id" value="{{ $product->coupon_id }}">

                @if (property_exists($product, 'oneoff'))
                  <input type="hidden" name="mode" value="payment">
                @else
                  <input type="hidden" name="mode" value="subscription">
                @endif

                <x-filament::button type="submit">Proceed to Payment</x-filament::button>
              @endif

              @if (config('app.payment_provider') === 'lemonsqueezy')
                <input type="hidden" name="coupon_id" value="{{ $product->coupon_id }}">
                <x-filament::button type="submit">Proceed to Payment</x-filament::button>
              @endif
            </form>
          </div>

          <div>
            @if ($selectedPlan)
              <h2 class="text-lg font-medium">{{ $selectedPlan->name }} @if ($selectedInterval)
                  / Billed {{ $selectedInterval }}
                @endif
              </h2>
              <p class="text-sm">{{ $selectedPlan->description }}</p>

              <hr class="border-gray-950/10 dark:border-white/15 my-4">

              @if ($selectedInterval)
                <h6 class="text-base font-medium">Details</h6>
                <p class="text-sm">
                  Base Plan (Billed {{ $selectedInterval }}) -

                  ${{ $this->getPrice($selectedPlan, $selectedInterval) }}
                </p>
                </p>
                <hr class="border-gray-950/10 dark:border-white/15 my-4">

                <h6 class="text-base font-medium">Features</h6>
                <ul>
                  @foreach ($selectedPlan->features as $feature)
                    <li class="flex items-center gap-2 my-2">
                      @svg('tabler-circle-check', 'w-5 h-5 text-primary')
                      <span class="text-sm">{{ $feature }}</span>
                    </li>
                  @endforeach
                </ul>
              @else
                <p class="font-medium">Price: <span class="font-medium">${{ $selectedPlan->price }}</span></p>
              @endif


            @endif
          </div>
        </div>
      </x-filament::card>
    @endif
  @else
    <div role="alert" class="alert bg-warning/50 text-warning border-warning/50">
      @svg('tabler-alert-circle', 'w-6 h-6')<span>No products or plans found. Please contact admin to update the plan.</span>
    </div>
  @endif
</div>
