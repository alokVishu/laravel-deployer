<div>
  <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
  <div class="py-12">
    <div>
      <div class="overflow-hidden sm:rounded-lg">
        <div class="p-6">
          <!-- Heading Section -->
          <div class="flex flex-col items-center justify-center mb-20">
            <h2 class="text-3xl font-semibold text-base-content w-3/4 text-center mx-auto">
              <span>
                Real
                <span class="relative font-bold">
                  Customers Reviews
                  <span
                    class="h-1 w-full bg-gradient-to-r from-primary/40  to-primary/0 start-0 -bottom-1 rounded-full absolute"
                    aria-hidden="true"></span>
                </span>
              </span>
            </h2>
            <p
              class="text-xl bg-gradient-to-l to-base-content/80 from-[#9295b366] bg-clip-text text-fill-transparent text-center  mx-auto mt-2">
              See what our customers have to say about their experience with our products.</p>
          </div>


          <!-- Reviews Grid -->
          <x-testimonial></x-testimonial>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- <div class="grid" data-masonry='{ "columnWidth": 282, "itemSelector": ".grid-item", "gutter": 24}'>
  @foreach ($reviews as $review)
    <div class="bg-gray-50 p-6 rounded-lg shadow grid-item">
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
    </div>
  @endforeach
</div> --}}
