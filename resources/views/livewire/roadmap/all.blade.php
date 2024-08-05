@inject('roadmapMapper', 'App\Mapper\RoadmapMapper')

<div class="m-4">
  {{-- add new roadmap --}}
  <div class="text-end">
    @if (Auth::check())
      <button type="button" class="btn btn-primary" data-overlay="#add-suggest-modal">
        @svg('tabler-plus', 'h-5 w-5')
        {{ __('Suggest a feature') }}
      </button>

      {{-- add suggestion dialog --}}
      <div id="add-suggest-modal" class="overlay modal overlay-open:opacity-100 hidden">
        <div class="modal-dialog overlay-open:opacity-100">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Dialog Title</h3>
              <button class="modal-close" data-overlay="#add-suggest-modal">
                <span class="icon-[tabler--x] size-5"></span>
              </button>
            </div>
            <div class="modal-body">
              This is some placeholder content to show the scrolling behavior for modals. Instead of repeating the text
              in
              the
              modal, we use an inline style to set a minimum height, thereby extending the length of the overall modal
              and
              demonstrating the overflow scrolling. When content becomes longer than the height of the viewport,
              scrolling
              will move the modal as needed.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-soft btn-secondary" data-overlay="#add-suggest-modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      {{-- temporary form to add suggestion --}}
      <div class="card bg-card w-[580px] shadow-xl text-start">
        <div class="card-body">
          <h5 class="card-title">Suggest a feature</h5>
          <p class="mb-4">Suggest a feature or stay on top of what we are working on.</p>

          <form wire:submit="save" class="flex flex-col gap-3">
            <div>
              <select class="select w-full" wire:model="form.type">
                {{-- loop over the RoadmapItem::TYPES --}}
                @foreach (\App\Constants\RoadmapItemType::cases() as $type)
                  <option value="{{ $type }}">{{ \App\Mapper\RoadmapMapper::mapTypeForDisplay($type) }}</option>
                @endforeach
              </select>
              <div class="text-sm text-red-500 mt-1">
                @error('form.type')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div>
              <input type="text" wire:model="form.title" placeholder="{{ __('What do you want to suggest?') }}"
                class="input w-full " />

              <div class="text-sm text-red-500 mt-1">
                @error('form.title')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div>
              <textarea rows="7" wire:model="form.description" class="textarea w-full"
                placeholder="{{ __('Provide more description.') }}">
            </textarea>

              <div class="text-sm text-red-500 mt-1">
                @error('form.description')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="text-end mt-3">
              <button type="button" class="btn btn-soft btn-secondary"
                data-overlay="#add-suggest-modal">Cancel</button>
              <button class="btn btn-primary" elementType="button" type="submit">
                {{ __('Suggest') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    @else
      <a href="{{ route('login') }}" class="btn btn-primary">{{ __('login to suggest a feature!') }}</a>
    @endif
  </div>

  {{-- roadmap filters --}}
  <div class="flex items-center justify-between flex-wrap">
    <nav class="tabs bg-card p-1 w-fit rounded-btn space-x-1 rtl:space-x-reverse my-10" aria-label="Tabs"
      role="tablist">
      <button type="button" class="btn btn-text {{ $status === 'all' ? 'bg-primary text-white' : '' }}"
        id="tabs-segment-item-1" data-tab="#tabs-segment-1" aria-controls="tabs-segment-1" role="tab"
        wire:click="filter('all')">
        {{ __('All') }}
      </button>

      <button wire:click="filter('under_consideration')" type="button"
        class="btn btn-text {{ $status === 'under_consideration' ? 'bg-primary text-white' : '' }}"
        id="tabs-segment-item-2" data-tab="#tabs-segment-2" aria-controls="tabs-segment-2" role="tab">
        {{ __('Under consideration') }}
      </button>

      <button wire:click="filter('planned')" type="button"
        class="btn btn-text {{ $status === 'planned' ? 'bg-primary text-white' : '' }}" id="tabs-segment-item-3"
        data-tab="#tabs-segment-3" aria-controls="tabs-segment-3" role="tab">
        {{ __('Planned') }}
      </button>

      <button type="button" wire:click="filter('in_development')"
        class="btn btn-text {{ $status === 'in_development' ? 'bg-primary text-white' : '' }}" id="tabs-segment-item-4"
        data-tab="#tabs-segment-4" aria-controls="tabs-segment-4" role="tab">
        {{ __('In Development') }}
      </button>

      <button wire:click="filter('shipped')" type="button"
        class="btn btn-text {{ $status === 'shipped' ? 'bg-primary text-white' : '' }}" id="tabs-segment-item-5"
        data-tab="#tabs-segment-5" aria-controls="tabs-segment-5" role="tab">
        {{ __('Shipped') }}
      </button>
    </nav>

    <select wire:loading.attr="disabled" wire:model.live="selectedFilter" class="select select-bordered min-w-[180px]">
      <option value="all">Filter</option>
      <option value="bug">Bugs</option>
      <option value="feature">Features</option>
      <option value="most-voted">Most Voted</option>
      <option value="least-voted">Least Voted</option>
    </select>
  </div>

  {{-- roadmap items --}}
  @if ($items && $items->isEmpty())
    <div class="text-center p-4 border border-gray-200 rounded-lg mt-4">
      <p>{{ __('No features found, but you can suggest one!') }}</p>
    </div>
  @else
    <div class="flex flex-col gap-6">
      @foreach ($items as $item)
        <a href="{{ route('roadmap.viewItem', ['itemSlug' => $item->slug]) }}">
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
                          <img
                            src="https://ui-avatars.com/api/?name={{ $item->user->name }}&color=FFFFFF&background=794dff" />
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
        </a>
      @endforeach
    </div>
  @endif

</div>
