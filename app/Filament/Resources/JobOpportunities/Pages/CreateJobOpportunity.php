<?php

namespace App\Filament\Resources\JobOpportunities\Pages;

use App\Filament\Resources\JobOpportunities\JobOpportunityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobOpportunity extends CreateRecord
{
    protected static string $resource = JobOpportunityResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
