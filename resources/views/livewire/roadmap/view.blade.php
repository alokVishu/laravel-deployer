@inject('roadmapMapper', 'App\Mapper\RoadmapMapper')

<div class="card w-full bg-card">
  <div class="card-body flex-row p-6 gap-6">
    <div>
      <x-roadmap.upvote-box :item="$item"></x-roadmap.upvote-box>
    </div>

    <div>
      <h5 class="mb-4">{{ $item->title }}</h5>

      <div class="mb-4">
        <span class="badge">
          {{ $roadmapMapper->mapStatusForDisplay($item->status) }}
        </span>
      </div>

      {{-- description --}}
      <p> {{ $item->description }}</p>

      <div class="flex items-center  mt-4">
        <div class="flex items-center gap-2">
          <div class="avatar">
            <div class="w-7 rounded-full">
              @if ($item->user->avatar_url === null)
                <img src="https://ui-avatars.com/api/?name={{ $item->user->name }}&color=FFFFFF&background=794dff" />
              @else
                <img src="{{ asset($item->user->avatar_url) }}" alt="user avatar" />
              @endif
            </div>
          </div>
          <h6>{{ $item->user->name }}</h6>
        </div>

        <div class="divider divider-horizontal mx-3 my-1.5"></div>

        <div class="text-base-content/50">
          {{ $item->created_at->diffForHumans() }}
        </div>

        <div class="divider divider-horizontal mx-3 my-1.5"></div>

        <div class="flex items-center gap-1">
          @svg('tabler-message-2')
          <span>{{ $item->comments->count() }}</span>
        </div>
      </div>
    </div>
  </div>
</div>
