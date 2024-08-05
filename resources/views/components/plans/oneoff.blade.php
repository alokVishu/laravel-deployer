@props(['product'])
<div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
  <!-- Pricing Card -->
  @foreach ($product->prices as $price)
    <form action="{{ route('products.checkout') }}" method="POST">
      @csrf
      <div
        class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
        <h3 class="mb-4 text-2xl font-semibold">{{ $price->name }}</h3>
        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $price->description }}
        </p>

        <div class="flex justify-center items-baseline my-8">
          <span class="mr-2 text-5xl font-extrabold">${{ $price->price }}</span>

          <input type="hidden" name="price_id" value="{{ $price->price_id }}">
        </div>

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
