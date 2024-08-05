<?php

namespace App\Livewire\Roadmap;

use App\Livewire\Forms\RoadmapItemForm;
use App\Models\RoadmapItem;
use App\Services\RoadmapManager;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class All extends Component
{
  use WithPagination;
  #[Url]

  public RoadmapItemForm $form;
  private RoadmapManager $roadmapManager;

  public $status = 'all';
  public $limit = 30;

  public $selectedFilter = 'all';

  public function render(RoadmapManager $roadmapManager)
  {
    $filterByStatus = $this->status !== 'all' ? $roadmapManager->getItemByStatus($this->status, $this->limit, $this->selectedFilter) : $roadmapManager->getAll($this->limit);

    return view('livewire.roadmap.all', [
      'items' => $this->filerData($filterByStatus),
    ]);
  }

  public function filter(string $status)
  {
    $this->status = $status;
  }

  public function filerData($data)
  {
    switch ($this->selectedFilter) {
      case 'feature':
        return $data->where('type', 'feature');
      case 'bug':
        return $data->where('type', 'bug');
      case 'most-voted':
        return $data->sortByDesc('upvotes');
      case 'least-voted':
        return $data->sortBy('upvotes');
      case 'all':
      default:
        return $data;
    }
  }

  public function upvote(int $id, RoadmapManager $roadmapManager)
  {
    if (!auth()->check()) {
      return redirect()->route('login');
    }

    $roadmapManager->upvote($id);
  }

  public function removeUpvote(int $id, RoadmapManager $roadmapManager)
  {
    if (!auth()->check()) {
      return redirect()->route('login');
    }

    $roadmapManager->removeUpvote($id);
  }

  public function save(RoadmapManager $roadmapManager)
  {
    $this->validate();

    $roadmapManager->createItem(
      $this->form->title,
      $this->form->description,
      $this->form->type
    );

    $this->redirectRoute('roadmap');
  }
}
