<x-filament::dropdown teleport :placement="$placement" :width="$isFlagsOnly ? 'flags-only' : 'fls-dropdown-width'" class="fi-dropdown fi-user-menu">
  <x-slot name="trigger">
    <div @class([
        'flex items-center justify-center w-9 h-9 language-switch-trigger hover:bg-gray-950/5 dark:hover:bg-white/5 dark:text-gray-300',
        'rounded-full' => $isCircular,
        'rounded-full' => !$isCircular,
        'p-1 ring-2 ring-inset ring-gray-200 hover:ring-gray-300 dark:ring-gray-500 hover:dark:ring-gray-400' =>
            $isFlagsOnly || $hasFlags,
    ])
      x-tooltip="{
                content: @js($languageSwitch->getLabel(app()->getLocale())),
                theme: $store.theme,
                placement: 'bottom'
            }">
      @if ($isFlagsOnly || $hasFlags)
        <x-filament-language-switch::flag :src="$languageSwitch->getFlag(app()->getLocale())" :circular="$isCircular" :alt="$languageSwitch->getLabel(app()->getLocale())" :switch="true" />
      @else
        {{-- <span class="font-semibold text-md">{{ $languageSwitch->getCharAvatar(app()->getLocale()) }}</span> --}}
        @svg('tabler-language', 'h-5 w-5')
      @endif
    </div>
  </x-slot>

  <x-filament::dropdown.list @class(['!border-t-0 space-y-1 !p-2.5']) style="min-inline-size: 175px">
    @foreach ($locales as $locale)
      <button type="button" wire:click="changeLocale('{{ $locale }}')"
        @if ($isFlagsOnly) x-tooltip="{
                        content: @js($languageSwitch->getLabel($locale)),
                        theme: $store.theme,
                        placement: 'right'
                    }" @endif
        @class([
            'flex items-center w-full transition-colors duration-75 rounded-md outline-none fi-dropdown-list-item whitespace-nowrap disabled:pointer-events-none disabled:opacity-70 fi-dropdown-list-item-color-gray hover:bg-gray-950/5 focus:bg-gray-950/5 dark:hover:bg-white/5 dark:focus:bg-white/5',
            'justify-center px-2 py-0.5' => $isFlagsOnly,
            'justify-start space-x-2 rtl:space-x-reverse px-4 py-2' => !$isFlagsOnly,
        ])
        @if (app()->isLocale($locale)) style="background-color: rgba(var(--primary-500), 0.24)" @endif>

        @if ($isFlagsOnly)
          <x-filament-language-switch::flag :src="$languageSwitch->getFlag($locale)" :circular="$isCircular" :alt="$languageSwitch->getLabel($locale)" class="w-7 h-7" />
        @else
          @if (app()->isLocale($locale))
            <span class="text-sm font-medium text-primary-500 hover:bg-gray-900 dark:text-gray-200">
              {{ $languageSwitch->getLabel($locale) }}
            </span>
          @else
            <span class="text-sm font-medium text-gray-600 hover:bg-transparent dark:text-gray-200">
              {{ $languageSwitch->getLabel($locale) }}
            </span>
          @endif
        @endif
      </button>
    @endforeach
  </x-filament::dropdown.list>
</x-filament::dropdown>
