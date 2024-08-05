<div class="flex flex-col gap-4 mt-4">
  {{-- Stop trying to control. --}}
  @foreach ($comments as $comment)
    <div class="card bg-card border-3 border-l-[3px] border-base-content/50">
      <div class="card-body">
        <div class="flex items-center gap-2 mb-4">
          <div class="avatar">
            <div class="w-7 rounded-full">
              @if ($comment->user->avatar_url === null)
                <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&color=FFFFFF&background=794dff" />
              @else
                <img src="{{ asset($comment->user->avatar_url) }}" alt="user avatar" />
              @endif
            </div>
          </div>

          <h6>{{ $comment->user->name }}</h6>
          <div class="divider divider-horizontal my-1.5 mx-0"></div>
          <div class="text-base-content/50">{{ $comment->created_at_human }}</div>
        </div>

        <p>{{ $comment->comment }}</p>
      </div>
    </div>
  @endforeach

  <form wire:submit="save" class="flex flex-col mt-6">
    <div class="bg-card p-6 rounded-xl border">
      <textarea name="comment" wire:model="comment" rows="4" id="commentBox" class="textarea w-full bg-card"
        placeholder="Write your comment about feature..."></textarea>
      <div class="text-end">
        <button type="submit" class="btn btn-primary text-end">
          {{ __('Add comment') }}
        </button>
      </div>
    </div>
    <div class="text-sm text-red-500 mt-1">
      @error('comment')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>
    @if (session()->has('message'))
      <div class="text-success">{{ session('message') }}</div>
    @endif
  </form>
</div>
