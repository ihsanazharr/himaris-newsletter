<?php

namespace App\Filament\Resources\Magazines\Pages;

use App\Filament\Resources\Magazines\MagazineResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMagazine extends EditRecord
{
    protected static string $resource = MagazineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
