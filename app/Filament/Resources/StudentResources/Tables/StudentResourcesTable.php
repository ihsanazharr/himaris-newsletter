<?php

namespace App\Filament\Resources\StudentResources\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class StudentResourcesTable
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
                    ->extraImgAttributes(['style' => 'border-radius:6px;object-fit:cover'])
                    ->defaultImageUrl(fn ($record) => self::defaultIcon($record->category)),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->title),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'notes'    => '📝 Notes & Materi',
                        'tutorial' => '🎓 Tutorial',
                        'template' => '📄 Template',
                        'ebook'    => '📚 E-Book',
                        'link'     => '🔗 Useful Link',
                        'tool'     => '🛠️ Tool / Software',
                        'other'    => '✨ Other',
                        default    => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'notes'    => 'info',
                        'tutorial' => 'success',
                        'template' => 'warning',
                        'ebook'    => 'primary',
                        'link'     => 'gray',
                        'tool'     => 'danger',
                        'other'    => 'gray',
                        default    => 'gray',
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

                IconColumn::make('file_path')
                    ->label('File')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-arrow-down')
                    ->falseIcon('heroicon-o-minus')
                    ->trueColor('success')
                    ->falseColor('gray'),

                IconColumn::make('external_url')
                    ->label('Link')
                    ->boolean()
                    ->trueIcon('heroicon-o-link')
                    ->falseIcon('heroicon-o-minus')
                    ->trueColor('info')
                    ->falseColor('gray'),

                TextColumn::make('user.name')
                    ->label('Uploaded By')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime('d M Y')
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
                    ->options([
                        'notes'    => 'Notes & Materi',
                        'tutorial' => 'Tutorial',
                        'template' => 'Template',
                        'ebook'    => 'E-Book',
                        'link'     => 'Useful Link',
                        'tool'     => 'Tool / Software',
                        'other'    => 'Other',
                    ]),

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
            ->emptyStateHeading('No student resources yet')
            ->emptyStateDescription('Upload your first resource using the button above.')
            ->emptyStateIcon('heroicon-o-academic-cap');
    }

    private static function defaultIcon(string $category): string
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($category) . '&background=6366f1&color=fff&size=72';
    }
}
