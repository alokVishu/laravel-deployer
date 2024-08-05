<?php

namespace App\Filament\Resources\RoadmapItemCommentResource\Pages;

use App\Filament\Resources\RoadmapItemCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoadmapItemComments extends ListRecords
{
    protected static string $resource = RoadmapItemCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
