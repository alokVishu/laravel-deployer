@php
  $bgImgSrc = URL::asset('images/pages/hero-bg.png');
@endphp

<div class="flex flex-col items-center justify-center text-center h-[376px] bg-center bg-cover bg-no-repeat px-4"
  style="background-image: url('{{ $bgImgSrc }}');">
  @if ($slot->isEmpty())
    <h2 class="mb-3 relative">
      {{ $title }}
      <span class="h-[2px] w-[90px] absolute -bottom-1 start-0.5 text-underlined-primary">
      </span>
    </h2>
    <p class="text-xl bg-gradient-to-l to-base-content/80 from-[#9295b366] bg-clip-text text-fill-transparent">
      {{ $subtitle }}
    </p>
  @else
    {{ $slot }}
  @endif
</div>
