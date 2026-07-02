<?php

namespace App\Filament\Resources\JobOpportunities\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class JobOpportunitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('thumbnail')
                    ->label('')
                    ->disk('public')
                    ->height(40)
                    ->width(40)
                    ->circular(),

                TextColumn::make('title')
                    ->label('Job Title')
                    ->searchable()
                    ->sortable()
                    ->limit(45)
                    ->tooltip(fn ($record) => $record->title),

                TextColumn::make('company')
                    ->label('Company')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'full-time'  => '💼 Full-Time',
                        'part-time'  => '⏰ Part-Time',
                        'internship' => '🎓 Internship',
                        'freelance'  => '🌐 Freelance',
                        default      => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'full-time'  => 'primary',
                        'part-time'  => 'success',
                        'internship' => 'warning',
                        'freelance'  => 'info',
                        default      => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'draft'     => 'gray',
                        'published' => 'success',
                        'closed'    => 'danger',
                        default     => 'gray',
                    }),

                TextColumn::make('location')
                    ->label('Location')
                    ->limit(25)
                    ->placeholder('—'),

                TextColumn::make('deadline')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('No deadline')
                    ->color(fn ($record) =>
                        $record->deadline && $record->deadline->isPast()
                            ? 'danger'
                            : null
                    ),

                TextColumn::make('user.name')
                    ->label('Posted By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Posted')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->defaultSort('created_at', 'desc')
            ->filters([

                SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                        'closed'    => 'Closed',
                    ]),

                SelectFilter::make('type')
                    ->options([
                        'full-time'  => 'Full-Time',
                        'part-time'  => 'Part-Time',
                        'internship' => 'Internship',
                        'freelance'  => 'Freelance',
                    ]),

                Filter::make('deadline_expired')
                    ->label('Deadline Expired')
                    ->query(fn (Builder $query) =>
                        $query->whereNotNull('deadline')
                              ->where('deadline', '<', now())
                    ),

                Filter::make('still_open')
                    ->label('Still Open')
                    ->query(fn (Builder $query) =>
                        $query->where(fn ($q) =>
                            $q->whereNull('deadline')
                              ->orWhere('deadline', '>=', now())
                        )
                    ),

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
            ->emptyStateHeading('No job opportunities yet')
            ->emptyStateDescription('Add the first job listing using the button above.')
            ->emptyStateIcon('heroicon-o-briefcase');
    }
}