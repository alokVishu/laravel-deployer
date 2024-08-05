@php
  $iconName = 'tabler-brand-' . strtolower($socialNetwork->title);
@endphp

<a target="_blank" href="{{ $socialNetwork->url }}" class="btn btn-{{ $socialNetwork->title }} btn-sm p-[6px] rounded-md">
  @svg($iconName, 'w-[18px] h-[18px]')
</a>
