<?php

namespace App\Filament\Resources\RoadmapItemResource\Pages;

use App\Constants\RoadmapItemStatus;
use App\Filament\Resources\RoadmapItemResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListRoadmapItems extends ListRecords
{
  protected static string $resource = RoadmapItemResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\CreateAction::make(),
    ];
  }

  public function getTabs(): array
  {
    return [
      'all' => Tab::make(),
      RoadmapItemStatus::UNDER_CONSIDERATION->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::UNDER_CONSIDERATION)),
      RoadmapItemStatus::PLANNED->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::PLANNED)),
      RoadmapItemStatus::IN_DEVELOPMENT->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::IN_DEVELOPMENT)),
      RoadmapItemStatus::SHIPPED->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::SHIPPED)),
      RoadmapItemStatus::CANCELLED->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::CANCELLED)),
      RoadmapItemStatus::REJECTED->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::REJECTED)),
      RoadmapItemStatus::ARCHIVED->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::ARCHIVED)),
      RoadmapItemStatus::PRIVATE->value => Tab::make()
        ->modifyQueryUsing(fn (Builder $query) => $query->where('status', RoadmapItemStatus::PRIVATE)),
    ];
  }
}
