<x-layouts.app>
  <x-section.heading title="JetShip Roadmap" subtitle="Suggest a feature or stay on top of what we are working on.">
  </x-section.heading>

  <div class="container py-20">
    <div class="flex justify-between items-center mb-10">
      <h3>Feature Details:</h3>
      <a href="{{ route('roadmap') }}" class="btn btn-primary">
        @svg('tabler-chevron-left')
        <span>{{ __('Back to Roadmap') }}</span>
      </a>
    </div>

    <livewire:roadmap.view :slug="$slug" />

    <livewire:roadmap.comment :slug="$slug" />
  </div>
</x-layouts.app>
