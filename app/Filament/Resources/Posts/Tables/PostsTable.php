<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
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
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(55)
                    ->tooltip(fn ($record) => $record->title),

                // Filament v5: use TextColumn->badge() + ->color() (closure) instead of deprecated BadgeColumn->colors()
                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Post::CATEGORY_LABELS[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        'whats-new'        => 'warning',
                        'self-improvement' => 'success',
                        'entertainment'    => 'primary',
                        'alumni-profile'   => 'info',
                        'review'           => 'gray',
                        'upcoming-event'   => 'warning',
                        'sponsored-content'=> 'danger',
                        'miscellaneous'    => 'gray',
                        default            => 'gray',
                    }),

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

                TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->placeholder('Not published yet'),

            ])
            ->defaultSort('published_at', 'desc')
            ->filters([

                SelectFilter::make('status')
                    ->options([
                        'draft'     => 'Draft',
                        'published' => 'Published',
                        'archived'  => 'Archived',
                    ]),

                SelectFilter::make('category')
                    ->options(Post::categoryOptions()),

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
            ->emptyStateHeading('No articles yet')
            ->emptyStateDescription('Create your first article using the button above.')
            ->emptyStateIcon('heroicon-o-newspaper');
    }
}