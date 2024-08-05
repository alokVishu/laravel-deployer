<x-layouts.app>
  <x-section.heading title="Author: {{ $author }}" subtitle="All Blogs are written by {{ $author }}">
  </x-section.heading>

  <div class="container py-20">
    {{-- blog card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($posts as $post)
        <div>
          <x-section.blog-card post="{{ $post }}" createdAt="{{ $post->created_at->diffForHumans() }}"
            readingTime="{{ calculate_reading_time($post->body) }}">
          </x-section.blog-card>
        </div>
      @endforeach
    </div>
  </div>
</x-layouts.app>
