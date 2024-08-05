<x-filament-widgets::widget class="grid grid-cols-1 md:grid-cols-3 gap-6">
  @foreach ($userEngagementData as $data)
    <x-filament::section>
      <div class="flex justify-between">
        <div class="flex flex-col gap-2">
          <h2 class="font-medium">{{ $data['title'] }}</h2>
          <h1 class="text-3xl font-semibold text-body-l/90 dark:text-body-d/90">{{ $data['value'] }}</h1>

        </div>
        <div class="bg-primary-100 dark:bg-primary-500/15 p-2 rounded-md h-12 w-12 relative">
          @svg($data['widgetIcon'], 'h-6 w-6 text-' . $data['color'] . '-500 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2')
        </div>
      </div>
      <div class="flex items-center mt-2">
        @svg($data['differenceIcon'], 'h-5 w-5 text-' . $data['differenceTextColor'] . '-500 me-1')
        <div class='text-{{ $data['differenceTextColor'] }}-500 text-sm font-medium me-2'>{{ $data['difference'] }}</div>
        <div class="text-body-l/50 dark:text-body-d/50 uppercase text-xs">{{ $data['differenceTime'] }}</div>
      </div>
    </x-filament::section>
  @endforeach

</x-filament-widgets::widget>
