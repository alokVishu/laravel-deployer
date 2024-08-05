<?php

namespace App\Filament\Resources\RoadmapItemResource\Pages;

use App\Filament\Resources\RoadmapItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoadmapItem extends EditRecord
{
    protected static string $resource = RoadmapItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
