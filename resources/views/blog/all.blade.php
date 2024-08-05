<x-layouts.app>
  <x-section.heading title="Articles & Stories"
    subtitle="Sign up now to access our exclusive library of members-only articles
and never miss out on important updates.">
  </x-section.heading>

  <div class="container py-20">
    <nav class="tabs bg-base-200/40 p-1 w-fit rounded-btn space-x-1 rtl:space-x-reverse mb-12 mx-auto" aria-label="Tabs"
      role="tablist">
      <a type="button" class="btn btn-text active-tab:bg-primary active-tab:text-white active" id="tabs-segment-item-1"
        data-tab="#tabs-segment-1" aria-controls="tabs-segment-1" role="tab" href="{{ route('blog') }}">
        {{ __('All') }}
      </a>

      @foreach ($categories as $category)
        <a type="button" class="btn btn-text active-tab:bg-primary active-tab:text-white"
          id="tabs-{{ $category->name }}" data-tab="#tabs-{{ $category->name }}"
          aria-controls="tabs-{{ $category->name }}" role="tab"
          href="{{ route('blog.category', ['slug' => $category->slug]) }}">
          {{ __($category->name) }}
        </a>
      @endforeach
    </nav>

    {{-- blog card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($posts as $post)
        <div>
          <x-section.blog-card post="{{ $post }}" createdAt="{{ $post->created_at->diffForHumans() }}"
            readingTime="{{ calculate_reading_time($post->body) }}"></x-section.blog-card>

        </div>
      @endforeach
    </div>

    <div class="mx-auto text-center p-4 md:max-w-lg">
      {{ $posts->links() }}
    </div>
  </div>

</x-layouts.app>
