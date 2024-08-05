<div class="flex items-center justify-center sm:px-[120px]">
  <div
    {{ $attributes->merge(['class' => 'lg:flex items-center min-h-[128px] py-6 sm:py-[34px] xl:ps-[66px] p-[24px] xl:pe-[103px] rounded-xl bg-card bg-opacity-[0.48]  max-w-[1240px] border-card border-opacity-[0.68] border-2 flex-col lg:flex-row inline-block']) }}>
    <h3 class="text-lg sm:text-2xl text-nowrap text-center">{{ __('TALL STACK') }}</h3>

    <div class="divider lg:divider-horizontal xl:mx-[80px] sm:my-6 xl:my-0"></div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 grow">
      <x-tech-stack.item>
        <div class="avatar bg-card">
          <div class="w-7 sm:w-12 rounded">
            <img src="{{ asset('images/tech-stack/tailwind-logo.png') }}" />
          </div>
        </div>
        <h4 class="text-base sm:text-xl">{{ __('Tailwind') }}</h4>
      </x-tech-stack.item>

      <x-tech-stack.item>
        <div class="avatar">
          <div class="w-7 sm:w-12 rounded">
            <img src="{{ asset('images/tech-stack/alpine-logo.png') }}" />
          </div>
        </div>
        <h4 class="text-base sm:text-xl">{{ __('Alpine') }}</h4>
      </x-tech-stack.item>

      <x-tech-stack.item>
        <div class="avatar">
          <div class="w-7 sm:w-12 rounded">
            <img src="{{ asset('images/tech-stack/laravel-logo.png') }}" />
          </div>
        </div>
        <h4 class="text-base sm:text-xl">{{ __('Laravel') }}</h4>
      </x-tech-stack.item>

      <x-tech-stack.item>
        <div class="avatar">
          <div class="w-7 sm:w-12 rounded">
            <img src="{{ asset('images/tech-stack/livewire-logo.png') }}" />
          </div>
        </div>
        <h4 class="text-base sm:text-xl">{{ __('Livewire') }}</h4>
      </x-tech-stack.item>
    </div>
  </div>
</div>
