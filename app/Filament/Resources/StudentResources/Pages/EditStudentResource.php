<?php

namespace App\Filament\Resources\StudentResources\Pages;

use App\Filament\Resources\StudentResources\StudentResourceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudentResource extends EditRecord
{
    protected static string $resource = StudentResourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
