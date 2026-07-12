<?php

namespace App\Filament\Resources\StudentResources\Pages;

use App\Filament\Resources\StudentResources\StudentResourceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentResource extends CreateRecord
{
    protected static string $resource = StudentResourceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
