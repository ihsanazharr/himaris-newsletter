<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('thumbnail')
                    ->label('')
                    ->disk('public')
                    ->height(48)
                    ->width(72)
                    ->extraImgAttributes(['style' => 'border-radius:6px;object-fit:cover']),

                TextColumn::make('title')
                    ->label('Event Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->title),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'draft'     => 'gray',
                        'published' => 'success',
                        'archived'  => 'danger',
                        default     => 'gray',
                    }),

                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('End Date')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('location')
                    ->label('Location')
                    ->limit(30)
                    ->placeholder('—'),

                TextColumn::make('organizer')
                    ->label('Organizer')
                    ->limit(25)
                    ->placeholder('—'),

                TextColumn::make('user.name')
                    ->label('Created By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->defaultSort('start_date', 'asc')
            ->filters([

                SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                        'archived'  => 'Archived',
                    ]),

                Filter::make('upcoming')
                    ->label('Upcoming Only')
                    ->query(fn (Builder $query) => $query->where('start_date', '>=', now())),

                Filter::make('past')
                    ->label('Past Events')
                    ->query(fn (Builder $query) => $query->where('start_date', '<', now())),

            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No events yet')
            ->emptyStateDescription('Create your first event using the button above.')
            ->emptyStateIcon('heroicon-o-calendar-days');
    }
}