@props(['products'])
<div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">

  @foreach ($products as $product)
    <!-- Pricing Card -->
    <form action="{{ route('products.checkout') }}" method="POST">
      @csrf
      <div
        class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
        <h3 class="mb-4 text-2xl font-semibold">{{ $product->name }}</h3>
        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $product->description }}
        </p>

        @foreach ($product->prices as $price)
          @if ($price->interval === 'monthly')
            <div class="flex justify-center items-baseline my-8">
              <span class="mr-2 text-5xl font-extrabold">${{ $price->price }}</span>
              <span class="text-gray-500 dark:text-gray-400">/{{ $price->interval }}</span>
              <input type="hidden" name="price_id" value="{{ $price->price_id }}">
            </div>
          @endif
        @endforeach

        <!-- List -->
        <ul role="list" class="mb-8 space-y-4 text-left">
          <li class="flex items-center space-x-3">
            <!-- Icon -->
            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
            <span>Individual configuration</span>
          </li>
          <li class="flex items-center space-x-3">
            <!-- Icon -->
            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
            <span>No setup, or hidden fees</span>
          </li>
          <li class="flex items-center space-x-3">
            <!-- Icon -->
            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
            <span>Team size: <span class="font-semibold">1 developer</span></span>
          </li>
          <li class="flex items-center space-x-3">
            <!-- Icon -->
            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
            <span>Premium support: <span class="font-semibold">6 months</span></span>
          </li>
          <li class="flex items-center space-x-3">
            <!-- Icon -->
            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
            <span>Free updates: <span class="font-semibold">6 months</span></span>
          </li>
        </ul>

        @if (property_exists($product, 'oneoff'))
          <input type="hidden" name="mode" value="payment">
        @else
          <input type="hidden" name="mode" value="subscription">
        @endif
        <input type="hidden" name="coupon_id" value="{{ $product->coupon_id }}">
        <input type="hidden" value="{{ json_encode($product) }}" name="product">
        <button type="submit">Checkout</button>
      </div>
    </form>
  @endforeach
</div>
