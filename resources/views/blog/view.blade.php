<x-layouts.app>
  @push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  @endpush

  @php
    $categories = [];
    foreach ($post->blogPostCategory as $cat) {
        $categories[] = $cat;
    }
  @endphp

  <x-section.blog-heading title="{{ $post->title }}" postImge="{{ $post->featured_image }}"
    categories="{{ json_encode($categories) }}" authorImg="{{ $post->author->avatar_url }}"
    authorName="{{ $post->author->name }}" publishedAt="{{ $post->published_at->diffForHumans() }}"
    readingTime="{{ $readingTime }}">
  </x-section.blog-heading>

  <div class="container py-20">
    <div class="grid grid-cols-12 gap-6">
      <div class="col-span-12 md:col-span-3">
        {{-- table of content --}}
        <div class="sticky top-[70px]">
          @if (count($tocData['toc']) > 0)
            <h4 class="mb-6">{{ __('Table of Contents') }}</h4>
            <ul class="flex flex-col gap-3" id="toc">
              @foreach ($tocData['toc'] as $item)
                <li class="font-medium toc-level-{{ $item['level'] }}">
                  <a href="#{{ $item['id'] }}"> {{ $item['text'] }}</a>
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>

      <div class="col-span-12 sm:col-span-10 md:col-span-8">
        <div class="blog-content">
          {!! $tocData['content'] !!}
        </div>

        {{-- newsletter --}}
        <x-section.newsletter class="mt-12"></x-section.newsletter>
      </div>

      <div class="col-span-12 sm:col-span-2 md:col-span-1">
        <div class="flex sm:flex-col items-end gap-6 flex-wrap sticky top-[70px]">
          <x-btn.share-btn></x-btn.share-btn>
        </div>
      </div>
    </div>

    <hr class="my-12 w-full">

    @if (count($morePosts) > 0)
      <div class="flex items-center gap-3 mb-6">
        @svg('tabler-file-invoice')
        <h5>
          {{ __('Related Blogs') }}
        </h5>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($morePosts as $post)
          <div>
            <x-section.blog-card post="{{ $post }}" createdAt="{{ $post->created_at->diffForHumans() }}"
              readingTime="{{ calculate_reading_time($post->body) }}"></x-section.blog-card>
          </div>
        @endforeach
      </div>
    @endif
  </div>

  {{-- table of content active link --}}
  @push('scripts')
    <script>
      const tocLinks = document.querySelectorAll('#toc a');
      const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id], h5[id], h6[id]');

      function highlightTocLink() {
        const scrollTop = window.scrollY + 80;
        const viewportHeight = window.innerHeight;

        headings.forEach((heading) => {
          const headingTop = heading.offsetTop;
          const headingHeight = heading.offsetHeight;

          if (scrollTop >= headingTop && scrollTop < headingTop + headingHeight) {
            const tocLinkId = `#toc a[href="#${heading.id}"]`;
            const tocLink = document.querySelector(tocLinkId);
            tocLink.style.color = 'oklch(var(--p))'; // update the color
          } else {
            const tocLinkId = `#toc a[href="#${heading.id}"]`;
            const tocLink = document.querySelector(tocLinkId);
            tocLink.style.color = ''; // reset the color
          }
        });
      }
      window.addEventListener('scroll', highlightTocLink);
    </script>
  @endpush
</x-layouts.app>
