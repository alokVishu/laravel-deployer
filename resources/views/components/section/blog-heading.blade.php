@php
  $bgImgSrc = URL::asset('images/pages/hero-bg.png');
@endphp
<div class="flex flex-col items-center justify-center min-h-[526px] bg-center bg-cover bg-no-repeat"
  style="background-image: url('{{ $bgImgSrc }}');">
  @if ($slot->isEmpty())
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="pt-20 md:pt-14">
          {{-- decoding data into array --}}
          @php
            $jsonString = html_entity_decode($categories);
            $arrayData = json_decode($jsonString, true);
          @endphp

          <div class="flex items-center gap-2 flex-wrap">
            @foreach ($arrayData as $category)
              <a href="{{ route('blog.category', ['slug' => $category['slug']]) }}" class="badge badge-primary">
                {{ $category['name'] }}</a>
            @endforeach
          </div>

          <h2 class="text-2xl md:text-3xl my-6">{!! $title !!}</h2>
          <div class="flex items-center gap-3 mb-4">
            <div class="avatar">
              <div class="w-8 rounded-full">
                @if ($authorImg)
                  <img src="{{ asset($authorImg) }}" alt="author imag">
                @else
                  <img src="https://ui-avatars.com/api/?name={{ $authorName }}&color=FFFFFF&background=794dff" />
                @endif
              </div>
            </div>
            <a href="{{ route('blog.author', ['name' => $authorName]) }}"
              class="font-semibold hover:underline">{{ $authorName }}</a>
          </div>

          <p class="flex items-center gap-1 text-sm text-base-content/50">
            {{ $publishedAt }} @svg('tabler-point-filled', 'w-2') {{ $readingTime }} {{ __('read') }}
          </p>
        </div>

        <div class="mt-4 md:mt-0 md:pt-14 flex items-center md:justify-end">
          <img src="{{ asset($postImge) }}" alt="feature image" class="max-h-[340px] rounded-xl">
        </div>
      </div>
    </div>
  @else
    {{ $slot }}
  @endif
</div>
