<?php

namespace App\Filament\Resources\StudentResources\Pages;

use App\Filament\Resources\StudentResources\StudentResourceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentResources extends ListRecords
{
    protected static string $resource = StudentResourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
