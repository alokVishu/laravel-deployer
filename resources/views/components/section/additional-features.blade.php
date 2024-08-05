<!-- Order your soul. Reduce your wants. - Augustine -->

<div class="py-12">
  <div class="overflow-hidden">
    <div>
      <!-- Heading Section -->
      <div class="mx-auto w-[228px] mb-20">
        <div class="bg-primary/10 flex items-center justify-center py-2 px-5 rounded-full">
          <h4 class="text-primary">Additional Features</h4>
        </div>
        @svg('tabler-arrow-down', 'h-6 w-6 text-primary text-center mx-auto')
      </div>

      <!-- Features Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($features as $feature)
          <div class="bg-card rounded-xl border p-6 flex items-start space-x-6">
            <div class="bg-base-content/10 rounded-md p-1.5">
              @svg($feature['icon'], 'h-8 w-8')
            </div>
            <div>
              <h3 class="text-lg font-semibold text-base-content/90 mb-1.5">{{ $feature['title'] }}</h3>
              <p class="text-base">{{ $feature['description'] }}</p>
            </div>
          </div>
        @endforeach



      </div>
    </div>
  </div>
</div>
