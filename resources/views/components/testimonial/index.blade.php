{{-- <div class="flex flex-wrap gap-4 justify-center grid-item">
  @foreach ($reviews as $review)
    <div class="card shadow-lg bg-white">
      <div class="card-body">
        <div class="flex items-center mb-4">
          <div class="avatar">
            <div class="w-16 rounded-full">
              <img src="{{ $review->user_image }}" alt="{{ $review->user_name }}">
            </div>
          </div>
          <div class="ml-4">
            <h3 class="card-title">{{ $review->user_name }}</h3>
            @if ($review->user_designation)
              <p class="text-sm opacity-70">{{ $review->user_designation }}</p>
            @endif
            @if ($review->user_location)
              <p class="text-sm opacity-70">{{ $review->user_location }}</p>
            @endif
          </div>
        </div>
        @if ($review->review_title)
          <h4 class="text-lg font-semibold">{{ $review->review_title }}</h4>
        @endif
        <p>{{ $review->review_desc }}</p>
        <div class="flex items-center mt-2">
          @for ($i = 0; $i < $review->ratings; $i++)
            @svg('tabler-star', 'h-5 w-5 fill-current text-yellow-500')
          @endfor
        </div>
        @if ($review->review_video)
          <div class="mt-4">
            <iframe class="w-full h-64" src="{{ $review->review_video }}" frameborder="0" allowfullscreen></iframe>
          </div>
        @endif
        <div class="card-actions mt-4">
          <a href="{{ $review->review_link }}" class="btn btn-primary text-white" target="_blank">
            {{ $review->review_platform }}
          </a>
        </div>
      </div>
    </div>
  @endforeach
</div> --}}

<div class="grid" data-masonry='{ "columnWidth": 300, "itemSelector": ".grid-item", "gutter": 24}'>
  @foreach ($reviews as $review)
    {{-- <div class="bg-gray-50 p-6 rounded-lg shadow grid-item">
      <div class="flex items-center mb-4">
        <div
          class="w-12 h-12 rounded-full bg-purple-200 flex items-center justify-center text-lg font-semibold text-purple-600 mr-4">
          {{ substr($review['name'], 0, 2) }}
        </div>
        <div>
          <h3 class="text-lg font-medium text-gray-700">{{ $review['name'] }}</h3>
          <div class="flex items-center text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path
                d="M2.166 10.278a8.082 8.082 0 11.547.547L1.75 15.25l4.425-1.093a8.082 8.082 0 01-3.95-3.95zm5.79 4.107l1.343.336a8.038 8.038 0 003.675-3.675l.336-1.342a1 1 0 10-1.895-.632l-.38 1.52a6.037 6.037 0 01-2.806 2.806l-1.519.38a1 1 0 00.632 1.895z" />
            </svg>
            <span class="ml-2 text-sm">{{ $review['country'] }}</span>
            <span class="ml-2 text-green-500">@svg('tabler-badge', 'h-5 w-5')</span>
            <span class="ml-2 text-sm text-green-500">verified User</span>
          </div>
        </div>
      </div>
      <div class="flex items-center mb-2">
        @for ($i = 0; $i < 5; $i++)
          @if ($i < $review['rating'])
            @svg('tabler-star', 'h-5 w-5 text-yellow-500')
          @else
            @svg('tabler-star', 'h-5 w-5 text-gray-300')
          @endif
        @endfor
        <span class="ml-2 text-sm text-green-600">{{ $review['platform'] }}</span>
      </div>
      <p class="text-gray-600">{{ $review['text'] }}</p>
    </div> --}}

    {{-- {{ dd($review->user_name) }} --}}

    <!-- resources/views/components/review-card.blade.php -->
    <div class="card bg-card shadow-none grid-item border border-base-content/10 rounded-xl">
      <div class="card-body">

        {{-- Header Section --}}
        <div class="flex items-center space-x-4">
          <div>
            @if ($review->user_image)
              <img src="{{ $review->user_image }}" alt="avatar" height="48" width="48" class="rounded-full">
            @else
              <img
                src='https://ui-avatars.com/api/?name={{ $review->user_name }}&size=48&color=794dff&background=794dff33&rounded=true'
                alt="avatar">
            @endif
          </div>

          <div>
            <div class="flex items-center gap-1.5 mb-1">
              <span class="text-lg font-semibold">{{ $review->user_name }}</span>
              <span class="flex">
                @svg('tabler-map-pin', 'h-5 w-5 me-0.5')
                <span class="capitalize">{{ $review->user_location }}</span>
              </span>
            </div>
            <div>
              <span class="badge badge-soft badge-success rounded-full">
                @svg('tabler-circle-check-filled', 'h-5 w-5')
                verified User
              </span>
            </div>
          </div>
        </div>
        <div class="mt-4 flex items-center">
          <div class="flex">
            @for ($i = 0; $i < 5; $i++)
              @svg('tabler-star', 'h-[22px] w-[22px] fill-current text-warning')
            @endfor
          </div>
          <div class="divider divider-horizontal mx-2"></div>
          <span class="text-sm text-base-content/80">{{ $review->review_platform }}</span>
        </div>
        <p class="mt-4">
          {{ $review->review_desc }}
        </p>
      </div>
    </div>
  @endforeach
</div>
