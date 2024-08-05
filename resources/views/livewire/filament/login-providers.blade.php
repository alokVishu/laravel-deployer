<div>
  {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

  <form wire:submit="save">
    {{ $this->form }}

    <div class="pt-4 flex gap-4">
      <x-filament::button type="submit">
        <x-filament::loading-indicator class="h-5 w-5 inline" wire:loading />
        {{ __('Save Changes') }}
      </x-filament::button>
    </div>
  </form>

</div>
