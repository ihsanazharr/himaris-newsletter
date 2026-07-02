<?php

namespace App\Filament\Resources\JobOpportunities\Pages;

use App\Filament\Resources\JobOpportunities\JobOpportunityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJobOpportunities extends ListRecords
{
    protected static string $resource = JobOpportunityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
