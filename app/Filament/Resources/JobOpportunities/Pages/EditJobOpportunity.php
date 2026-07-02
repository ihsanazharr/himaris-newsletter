<?php

namespace App\Filament\Resources\JobOpportunities\Pages;

use App\Filament\Resources\JobOpportunities\JobOpportunityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJobOpportunity extends EditRecord
{
    protected static string $resource = JobOpportunityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
