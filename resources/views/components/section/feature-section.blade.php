<div class="py-24">
  <div @class([
      'flex flex-col items-center justify-between pt-1 pb-10 space-y-8 lg:space-y-0 lg:flex-row',
      'lg:flex-row-reverse' => $reverse,
  ])>
    <div class="max-w-lg">
      <div class="flex items-center space-x-4">
        <div class="flex items-center justify-center h-11 w-11 rounded-md bg-primary/10">
          @svg($featureIcon, 'h-8 w-8 text-primary')
        </div>
        <h4 class="text-primary">{{ $featureTitle }}</h4>
      </div>
      <h1 class="mt-4">{{ $title }}</h1>
      <h1 class="text-base-content/50 mt-2">{{ $description }}</h1>
    </div>
    <div>
      <img src="{{ $featureImage }}" alt="Dashboard Screenshot">
    </div>
  </div>

  <div
    class="grid gap-8 {{ count($features) % 4 === 0 ? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4' : 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3' }}">
    @foreach ($features as $feature)
      <x-landing-page.feature-card :title="$feature['title']" :icon="$feature['icon']" :description="$feature['description']"></x-landing-page.feature-card>
    @endforeach
  </div>
</div>
