<?php

namespace App\Filament\Resources\JobOpportunities;

use App\Filament\Resources\JobOpportunities\Pages\CreateJobOpportunity;
use App\Filament\Resources\JobOpportunities\Pages\EditJobOpportunity;
use App\Filament\Resources\JobOpportunities\Pages\ListJobOpportunities;
use App\Filament\Resources\JobOpportunities\Schemas\JobOpportunityForm;
use App\Filament\Resources\JobOpportunities\Tables\JobOpportunitiesTable;
use App\Models\JobOpportunity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JobOpportunityResource extends Resource
{
    protected static ?string $model = JobOpportunity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static \UnitEnum|string|null $navigationGroup = 'Content Management';  // ← fix

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return JobOpportunityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobOpportunitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListJobOpportunities::route('/'),
            'create' => CreateJobOpportunity::route('/create'),
            'edit'   => EditJobOpportunity::route('/{record}/edit'),
        ];
    }
}