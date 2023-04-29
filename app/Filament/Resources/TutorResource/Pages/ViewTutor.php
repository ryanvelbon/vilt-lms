<?php

namespace App\Filament\Resources\TutorResource\Pages;

use App\Filament\Resources\TutorResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTutor extends ViewRecord
{
    protected static string $resource = TutorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
