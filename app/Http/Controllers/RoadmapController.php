<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoadmapController extends Controller
{
  public function index()
  {
    $this->isRoadmapEnabled();

    return view('roadmap.index');
  }

  public function viewItem(string $itemSlug)
  {
    $this->isRoadmapEnabled();

    return view('roadmap.view', [
      'slug' => $itemSlug,
    ]);
  }

  private function isRoadmapEnabled()
  {
    if (!config('app.roadmap_enabled')) {
      abort(404);
    }
  }
}
