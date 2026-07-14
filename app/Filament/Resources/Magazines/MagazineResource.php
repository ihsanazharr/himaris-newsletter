<?php

namespace App\Filament\Resources\Magazines;

use App\Filament\Resources\Magazines\Pages\CreateMagazine;
use App\Filament\Resources\Magazines\Pages\EditMagazine;
use App\Filament\Resources\Magazines\Pages\ListMagazines;
use App\Filament\Resources\Magazines\Schemas\MagazineForm;
use App\Filament\Resources\Magazines\Tables\MagazinesTable;
use App\Models\Magazine;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MagazineResource extends Resource
{
    protected static ?string $model = Magazine::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static \UnitEnum|string|null $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Magazine Archive';

    protected static ?string $modelLabel = 'Magazine';

    protected static ?string $pluralModelLabel = 'Magazine Archive';

    protected static ?int $navigationSort = 7;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return MagazineForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MagazinesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListMagazines::route('/'),
            'create' => CreateMagazine::route('/create'),
            'edit'   => EditMagazine::route('/{record}/edit'),
        ];
    }
}
