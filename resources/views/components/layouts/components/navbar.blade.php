<nav id="main-navbar" class="fixed top-0 end-0 start-0 z-10">
  <div class="container navbar">
    <div class="flex items-center gap-3">
      <a class="link text-base-content/90 link-neutral text-xl font-semibold no-underline" href="{{ url('/') }}">
        <x-layouts.partials.logo></x-layouts.partials.logo>
      </a>
      <span class="badge badge-error badge-soft h-auto hidden sm:flex">
        <img src="/images/tech-stack/laravel.png" alt="laravel">
        {{ __('Laravel Boilerplate') }}
      </span>
    </div>

    <div class="ms-auto">
      <ul class="items-center gap-5 hidden lg:flex">
        <li>
          <x-link.simple-link href="#block-pages" class="font-medium">
            {{ __('Blocks & Pages') }}
          </x-link.simple-link>
        </li>
        <li>
          <x-link.simple-link href="#documentation" class="font-medium">
            {{ __('Documentation') }}
          </x-link.simple-link>
        </li>
        <li>
          <x-link.simple-link href="#features" class="font-medium">
            {{ __('Features') }}
          </x-link.simple-link>
        </li>
        <li>
          <x-link.simple-link href="#pricing-plans" class="font-medium">
            {{ __('Pricing & Plans') }}
          </x-link.simple-link>
        </li>
        <li>
          <x-link.simple-link href="#faq" class="font-medium">
            {{ __('FAQ') }}
          </x-link.simple-link>
        </li>
        <li>
          @if (Auth::check())
            @php
              $authUser = Auth::user();
            @endphp

            <div class="dropdown relative inline-flex rtl:[--placement:bottom-end]">
              <button id="dropdown-avatar" type="button"
                class="dropdown-toggle btn btn-ghost flex items-center gap-2 px-2 rounded-full">
                <div class="avatar">
                  <div class="size-8 rounded-full">
                    @if ($authUser->avatar_url)
                      <img src="{{ asset($authUser->avatar_url) }}" />
                    @else
                      <img
                        src="https://ui-avatars.com/api/?name={{ $authUser->name }}&color=FFFFFF&background=794dff" />
                    @endif
                  </div>
                </div>
              </button>

              <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" aria-labelledby="dropdown-avatar">
                <li class="dropdown-header gap-3">
                  <div class="avatar">
                    <div class="w-10 rounded-full">
                      @if ($authUser->avatar_url)
                        <img src="{{ asset($authUser->avatar_url) }}" />
                      @else
                        <img
                          src="https://ui-avatars.com/api/?name={{ $authUser->name }}&color=FFFFFF&background=794dff" />
                      @endif
                    </div>
                  </div>
                  <div>
                    <h6 class="text-base-content/90 text-base font-semibold">{{ $authUser->name }}</h6>
                    <small class="text-base-content/40">{{ $authUser->email }}</small>
                  </div>
                </li>
                <li><a class="dropdown-item" href="{{ route('filament.dashboard.pages.dashboard') }}">Dashboard</a>
                </li>
                @if ($authUser->is_admin)
                  <li><a class="dropdown-item" href="{{ route('filament.admin.pages.dashboard') }}">Admin Dashboard</a>
                  </li>
                @endif
                {{-- logout --}}
                <li class="dropdown-footer gap-2">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-error btn-soft btn-block">Sign out</button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <a href="javascript:void(0)" class="btn btn-primary btn-sm">{{ __('Get started now') }}</a>
          @endif
        </li>
      </ul>

      {{-- small screen menu --}}
      <div class="dropdown dropdown-end lg:hidden">
        <button tabindex="0" class="btn btn-square btn-sm btn-ghost">
          @svg('tabler-menu-2')
        </button>

        <ul tabindex="0" class="menu dropdown-content mt-3 z-[1] p-2 bg-card rounded-lg shadow min-w-56">
          <li>
            <x-link.simple-link href="#block-pages">
              {{ __('Blocks & Pages') }}
            </x-link.simple-link>
          </li>
          <li>
            <x-link.simple-link href="#documentation">
              {{ __('Documentation') }}
            </x-link.simple-link>
          </li>
          <li>
            <x-link.simple-link href="#features">
              {{ __('Features') }}
            </x-link.simple-link>
          </li>
          <li>
            <x-link.simple-link href="#pricing-plans">
              {{ __('Pricing & Plans') }}
            </x-link.simple-link>
          </li>
          <li>
            <x-link.simple-link href="#faq">
              {{ __('FAQ') }}
            </x-link.simple-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

@push('scripts')
  <script>
    function toggleNavbar() {
      const navbar = document.querySelector('#main-navbar');
      if (window.scrollY > 10) {
        navbar.classList.add('shadow');
        navbar.classList.add('bg-base-100');
      } else {
        navbar.classList.remove('shadow');
        navbar.classList.remove('bg-base-100');
      }
    };

    window.addEventListener('scroll', function() {
      toggleNavbar();
    });
  </script>
@endpush
