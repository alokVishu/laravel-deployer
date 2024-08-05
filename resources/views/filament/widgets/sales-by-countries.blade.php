<x-filament-widgets::widget>
  <x-filament::section>
    {{-- Widget content --}}
    <div>
      <div class="flex justify-between mb-5">
        <div>
          <h1 class="text-lg font-medium mb-1.5">Sales By Countries</h1>
          <h3 class="text-sm text-gray-400">Monthly Sales Overview</h3>
        </div>
        @svg('tabler-dots-vertical', 'w-6 h-6 text-gray-400')
      </div>

      <div>
        @foreach ($countrySales as $countrySale)
          <div class="flex items-center justify-between mb-5">
            <div class="flex items-center">
              <div class="w-8.5 h-8.5 rounded-full">
                <img src="{{ $this->getFlag($countrySale['title']) }}" alt="Flag">
              </div>
              <div class="ms-4">
                <h1 class="text-regular font-medium">{{ $countrySale['sales'] }}</h1>
                <h3 class="text-sm text-gray-400">{{ $countrySale['title'] }}</h3>
              </div>
            </div>
            <div>
              @if ($countrySale['yoygrowth'] > 0)
                <div class="text-green-500 flex items-center gap-1">
                  @svg('tabler-chevron-up', 'w-5 h-5')
                  <span class="font-medium">{{ $countrySale['yoygrowth'] }}%</span>
                </div>
              @else
                <div class="text-danger-500 flex items-center gap-1">
                  @svg('tabler-chevron-down', 'w-5 h-5')
                  <span class="font-medium">{{ abs($countrySale['yoygrowth']) }}%</span>
                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
  </x-filament::section>
</x-filament-widgets::widget>
