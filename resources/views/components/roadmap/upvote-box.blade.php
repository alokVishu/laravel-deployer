@inject('roadmapManager', 'App\Services\RoadmapManager')

@if ($roadmapManager->hasUserUpvoted($item) && $item->status !== \App\Constants\RoadmapItemStatus::SHIPPED->value)
  <div class="border w-[80px] h-[88px] rounded-xl flex items-center justify-center flex-col gap-1 border-primary"
    wire:click.prevent="removeUpvote({{ $item->id }})">
    <span>
      @svg('tabler-thumb-up', 'text-primary')
    </span>
    <h4 class="font-semibold">
      {{ $item->upvotes ?? 0 }}
    </h4>
  </div>
@else
  @if ($roadmapManager->isUpvotable($item))
    <div class="border w-[80px] h-[88px] rounded-xl flex items-center justify-center flex-col gap-1"
      wire:click.prevent="upvote({{ $item->id }})">
      <span>
        @svg('tabler-thumb-up')
      </span>
      <h4 class="font-semibold">
        {{ $item->upvotes ?? 0 }}
      </h4>
    </div>
  @else
    <div class="border w-[80px] h-[88px] rounded-xl flex items-center justify-center flex-col gap-1 bg-base-100">
      <span>
        @svg('tabler-thumb-up')
      </span>
      <h4 class="font-semibold">
        {{ $item->upvotes ?? 0 }}
      </h4>
    </div>
  @endif
@endif
