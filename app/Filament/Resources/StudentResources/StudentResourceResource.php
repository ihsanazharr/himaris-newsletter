<?php

namespace App\Filament\Resources\StudentResources;

use App\Filament\Resources\StudentResources\Pages\CreateStudentResource;
use App\Filament\Resources\StudentResources\Pages\EditStudentResource;
use App\Filament\Resources\StudentResources\Pages\ListStudentResources;
use App\Filament\Resources\StudentResources\Schemas\StudentResourceForm;
use App\Filament\Resources\StudentResources\Tables\StudentResourcesTable;
use App\Models\StudentResource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StudentResourceResource extends Resource
{
    protected static ?string $model = StudentResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static \UnitEnum|string|null $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Student Resources';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $pluralModelLabel = 'Student Resources';

    protected static ?string $modelLabel = 'Student Resource';

    public static function form(Schema $schema): Schema
    {
        return StudentResourceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentResourcesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListStudentResources::route('/'),
            'create' => CreateStudentResource::route('/create'),
            'edit'   => EditStudentResource::route('/{record}/edit'),
        ];
    }
}
