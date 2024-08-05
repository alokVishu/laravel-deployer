<?php

namespace App\Livewire\Roadmap;

use App\Models\RoadmapItem;
use App\Models\RoadmapItemComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
  public $slug;

  public $comment;

  protected $rules = [
    'comment' => 'required|min:5',
  ];

  public function getRoadmapIdFromSlug()
  {
    return RoadmapItem::where('slug', $this->slug)->first()->id;
  }

  public function getAllComments()
  {
    $comments = RoadmapItemComment::where('roadmap_item_id', $this->getRoadmapIdFromSlug())->where('approved', true)->get();

    if ($comments->count() > 0) {
      $comments->map(function ($comment) {
        $comment->created_at_human = $comment->created_at->diffForHumans();
        return $comment;
      });
    }

    return $comments;
  }

  public function render()
  {
    return view('livewire.roadmap.comment', [
      'comments' => $this->getAllComments(),
    ]);
  }

  public function save()
  {
    $this->validate();

    if (Auth::check() && $this->comment) {
      RoadmapItemComment::create([
        'roadmap_item_id' => $this->getRoadmapIdFromSlug(),
        'user_id' => auth()->id(),
        'comment' => $this->comment,
      ]);

      // Optionally, clear the form fields after saving
      $this->reset(['comment']);

      session()->flash('message', 'Comment successfully posted.');
    } else {
      $this->reset(['comment']);
      redirect()->route('login');
    }
  }
}
