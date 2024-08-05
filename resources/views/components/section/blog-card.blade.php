@php
  $data = html_entity_decode($post);
  $postData = json_decode($data, false);
@endphp
<div class="card">
  @if ($postData->featured_image)
    <a href="{{ route('blog.view', $postData->slug) }}" class="mb-3 overflow-hidden rounded-xl aspect-video">
      <img src="{{ asset($postData->featured_image) }}" alt="Shoes" class="w-100" />
    </a>
    <a href="{{ route('blog.view', $postData->slug) }}" class="mb-3">
      <h5>
        {{ $postData->title }}
      </h5>
    </a>
    <p class=mb-3>
      {{ \Illuminate\Support\Str::limit($postData->seo_description, 135) }}
    </p>

    <p class="flex items-center gap-1 text-sm text-base-content/50">
      {{ $createdAt }} @svg('tabler-point-filled', 'w-2') {{ $readingTime }} {{ __('read') }}
    </p>
  @endif
</div>
