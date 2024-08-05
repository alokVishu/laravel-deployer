@php
  $bgImgSrc = URL::asset('images/pages/hero-bg.png');
@endphp

<div class="bg-bottom bg-cover bg-no-repeat" style="background-image: url('{{ $bgImgSrc }}');">
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div class="col-span-1 pt-[120px] lg:py-[186px] text-center lg:text-start">
        {{-- sliding text --}}
        <div class="flex items-center justify-center lg:justify-start gap-2 mb-5 slide-in">
          <div class="-ms-4">
            <img src="{{ asset('images/pages/hero-text-icon.png') }}"></img>
          </div>
          <h2
            class="italic bg-gradient-to-r from-primary to-error bg-clip-text text-fill-transparent text-2xl md:text-3xl">
            {{ __('Launch Now') }}
          </h2>
        </div>

        <div class="mb-4 relative inline-block">
          <h1 class="text-2xl md:text-4xl">{{ __('Effortless SaaS 🚀') }}</h1>
          <h1 class="text-2xl md:text-4xl">{{ __('Launch Like a Pro in Days') }}</h1>
          <div class="absolute -top-2 -end-10 flip-icon-animation">
            <img src="{{ asset('images/pages/dollar-icon.png') }}" class="flip-icon" alt="dollar">
            <img src="{{ asset('images/pages/dollar-icon.png') }}" class="w-6 ms-8 flip-icon" alt="dollar">
          </div>
        </div>

        <div class="mb-4">
          <p class="md:text-xl">
            {{ __('Ship Faster and Focus on Growth with the') }}
          </p>
          <p class="md:text-xl">
            {{ __('All-In-One') }}
            <strong class="text-primary relative">
              {{ __('TALL Stack') }}
              <span class="h-[2px] w-[110px] absolute -bottom-1 start-0.5 text-underlined-primary">
              </span>
            </strong>
            {{ __('Boilerplate') }}.
          </p>
        </div>

        <div class="flex items-center justify-center lg:justify-start gap-3 flex-wrap">
          <div class="avatar-group -space-x-6 rtl:space-x-reverse">
            <div class="avatar border-card">
              <div class="w-10">
                <img src="{{ asset('images/avatar/avatar-1.png') }}" />
              </div>
            </div>
            <div class="avatar border-card">
              <div class="w-10">
                <img src="{{ asset('images/avatar/avatar-2.png') }}" />
              </div>
            </div>
            <div class="avatar border-card">
              <div class="w-10">
                <img src="{{ asset('images/avatar/avatar-3.png') }}" />
              </div>
            </div>
            <div class="avatar border-card">
              <div class="w-10">
                <img src="{{ asset('images/avatar/avatar-4.png') }}" />
              </div>
            </div>
          </div>

          <div>
            <p>{{ __('Loved by great clients') }}</p>
            <div class="flex items-center">
              @foreach (range(1, 5) as $i)
                @svg('tabler-star-filled', 'w-6 h-6 text-[#FCAA1D]')
              @endforeach
            </div>
          </div>
        </div>

        <div class="mt-[54px] flex items-center gap-4 flex-wrap justify-center lg:justify-start">
          <a href="#" role="button" class="btn btn-primary text-lg">
            {{ __('Get Started Now') }} @svg('tabler-rocket', 'w-5 h-5')
          </a>

          <a href="#" role="button" class="btn btn-primary btn-outline btn-soft md:text-lg">
            {{ __('Live Demo') }} @svg('tabler-arrow-right', 'w-5 h-5')
          </a>
        </div>
      </div>

      <div class="col-span-1 lg:py-[175px] bg-no-repeat bg-center max-[1279px]:!bg-none"
        style="background-image: url({{ asset('images/pages/bg-shape.svg') }})">
        <img src="{{ asset('images/pages/hero-dashboard.png') }}" alt="hero"
          class="min-[1280px]:h-[530px] mx-auto lg:mx-0 cursor-pointer" onclick="my_modal_1.showModal()" />
      </div>
    </div>
  </div>
</div>

{{-- model for video --}}
<dialog id="my_modal_1" class="modal">
  <div class="modal-box bg-base-100 w-11/12 max-w-5xl p-0 rounded-sm focus-visible:outline-none">
    <video id="video-player" width="100%" height="100%" controls>
      <source src="{{ asset('video/movie.mp4') }}" type="video/mp4">
      <source src="{{ asset('video/movie.mp4') }}" type="video/ogg">
      {{ __('Your browser does not support the video tag') }}.
    </video>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>{{ __('close') }}</button>
  </form>
</dialog>

@push('scripts')
  <script>
    var video = document.getElementById("video-player");
    var modal = document.getElementById("my_modal_1");

    function pauseVideo() {
      video.pause();
    }
    // Watch for modal close events
    modal.addEventListener('close', function() {
      pauseVideo();
    });
  </script>
@endpush
