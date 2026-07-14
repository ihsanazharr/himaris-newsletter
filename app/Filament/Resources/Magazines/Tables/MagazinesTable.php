<?php

namespace App\Filament\Resources\Magazines\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MagazinesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->disk('public')
                    ->height(80)
                    ->width(56),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('edition')
                    ->label('Edition')
                    ->searchable()
                    ->default('—'),

                TextColumn::make('author_name')
                    ->label('Author / Editor')
                    ->searchable()
                    ->default('—'),

                TextColumn::make('published_date')
                    ->label('Published')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'published' => 'success',
                        'draft'     => 'warning',
                        'archived'  => 'gray',
                        default     => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Added')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                        'archived'  => 'Archived',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_date', 'desc');
    }
}
