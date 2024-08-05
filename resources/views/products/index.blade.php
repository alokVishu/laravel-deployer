<x-layouts.app>
  <h1>Products</h1>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Designed for
          business teams like yours</h2>
        <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here at Flowbite we focus on
          markets where technology, innovation, and capital can unlock long-term value and drive economic
          growth.</p>
      </div>



      @if ($products)
        <x-plans.subscription :products="$products" />
        {{-- <x-plans.oneoff :product="$products[0]" /> --}}
      @endif

    </div>
  </section>

  <p>
    @if (config('app.payment_providers.stripe'))
      <form action="{{ route('products.checkout') }}" method="POST">
        @csrf
        <button type="submit">Checkout</button>
      </form>
    @endif

    @if (config('app.payment_providers.lemonsqueezy'))
      <form action="{{ route('products.checkout-lemonsqueezy') }}" method="POST">
        @csrf
        <button type="submit">Checkout Lemon Squeezy</button>
      </form>
    @endif

  </p>

</x-layouts.app>
