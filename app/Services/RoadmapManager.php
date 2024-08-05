<?php

namespace App\Services;

use App\Constants\RoadmapItemStatus;
use App\Constants\RoadmapItemType;
use App\Models\RoadmapItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoadmapManager
{

  public function getItemBySlug(string $slug)
  {
    return RoadmapItem::where('slug', $slug)
      ->where(function ($query) {
        $query->whereIn('status', [
          RoadmapItemStatus::PLANNED,
          RoadmapItemStatus::IN_DEVELOPMENT,
          RoadmapItemStatus::SHIPPED,
          RoadmapItemStatus::CANCELLED,
        ])->orWhere(function ($query) {
          if (!auth()->check()) {
            return;
          }

          $query->where('status', RoadmapItemStatus::UNDER_CONSIDERATION)
            ->where('user_id', auth()->id());
        });
      })
      ->firstOrFail();
  }

  public function getAll(int $limit = 30)
  {
    return RoadmapItem::whereIn('status', [
      RoadmapItemStatus::PLANNED,
      RoadmapItemStatus::IN_DEVELOPMENT,
    ])->orWhere(function ($query) {
      if (!auth()->check()) {
        return;
      }

      $query->where('status', RoadmapItemStatus::UNDER_CONSIDERATION)
        ->where('user_id', auth()->id());
    })
      ->orderBy('upvotes', 'desc')
      ->orderBy('title', 'asc')
      ->paginate($limit);
  }

  public function getItemByStatus(string $status, int $limit = 30)
  {

    return RoadmapItem::where('status', [$status])
      ->orderBy('upvotes', 'desc')
      ->orderBy('title', 'asc')
      ->paginate($limit);
  }

  public function getCompleted(int $limit = 30)
  {
    return RoadmapItem::where('status', RoadmapItemStatus::SHIPPED)
      ->orderBy('upvotes', 'desc')
      ->orderBy('title', 'asc')
      ->paginate($limit);
  }

  public function upvote(int $id)
  {
    if (!auth()->check()) {
      return;
    }

    $item = RoadmapItem::where('id', $id)->firstOrFail();

    DB::transaction(function () use ($item) {

      // if user has already upvote, do nothing
      if ($item->upvotes()->where('user_id', auth()->id())->exists()) {
        return;
      }

      $item->increment('upvotes');

      $item->upvotes()->attach(auth()->id(), [
        'ip_address' => request()->ip(),
      ]);
    });
  }

  public function removeUpvote(int $id)
  {
    if (!auth()->check()) {
      return;
    }

    $item = RoadmapItem::where('id', $id)->firstOrFail();

    // if user has not upvote, do nothing
    if (!$item->upvotes()->where('user_id', auth()->id())->exists()) {
      return;
    }

    DB::transaction(function () use ($item) {
      $item->decrement('upvotes');

      $item->upvotes()->detach(auth()->id());
    });
  }

  public function hasUserUpvoted(RoadmapItem $item)
  {
    if (!auth()->check()) {
      return false;
    }

    return $item->upvotes()->where('user_id', auth()->id())->exists();
  }

  public function isUpvotable(RoadmapItem $item)
  {
    return in_array($item->status, [
      RoadmapItemStatus::PLANNED->value,
      RoadmapItemStatus::IN_DEVELOPMENT->value,
    ]) || (auth()->check() && $item->status === RoadmapItemStatus::UNDER_CONSIDERATION->value && $item->user_id === auth()->id());
  }

  public function prepareForDisplay(string $string)
  {
    // turn urls into <a> tags with rel="noopener noreferrer nofollow ugc" for SEO
    $string = preg_replace(
      '/(https?:\/\/[^\s]+)/',
      '<a href="$1" rel="noopener noreferrer nofollow ugc" target="_blank">$1</a>',
      $string
    );

    $string = nl2br($string);

    return $string;
  }

  public function createItem(string $title, string $description, string $type)
  {
    $currentUser = auth()->user();

    $slug = Str::slug(Str::limit($title, 20)) . '-' . Str::random(6);

    $roadMapItem = RoadmapItem::create([
      'title' => $title,
      'slug' => $slug,
      'description' => $this->cleanupDescription($description),
      'type' => RoadmapItemType::from($type)->value,
      'user_id' => auth()->id(),
      'upvotes' => 1,
      'status' => RoadmapItemStatus::UNDER_CONSIDERATION->value,
    ]);

    // add upvote for the user who created the item
    $roadMapItem->upvotes()->attach($currentUser->id, [
      'ip_address' => request()->ip(),
    ]);

    return $roadMapItem;
  }

  private function cleanupDescription(string $description)
  {
    $description = clean($description, [
      'HTML.Allowed' => '',
    ]);

    return $description;
  }
}
