<?php

namespace App\Filament\Resources\Magazines\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MagazineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Magazine Details')
                ->description('Basic information about this magazine edition.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('e.g. Himaris Newsletter Vol. 2')
                        ->columnSpanFull(),

                    TextInput::make('edition')
                        ->label('Edition / Volume')
                        ->maxLength(255)
                        ->placeholder('e.g. Volume 2 — 2025'),

                    DatePicker::make('published_date')
                        ->label('Published Date')
                        ->displayFormat('d M Y'),

                    TextInput::make('author_name')
                        ->label('Author / Editor')
                        ->maxLength(255)
                        ->placeholder('e.g. Deviani Putri Azzahra'),

                    Select::make('status')
                        ->label('Status')
                        ->required()
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                            'archived'  => 'Archived',
                        ])
                        ->default('draft'),

                    TextInput::make('file_url')
                        ->label('Read / Download URL')
                        ->maxLength(500)
                        ->placeholder('https://issuu.com/... or Google Drive link')
                        ->url()
                        ->columnSpanFull(),

                ]),

            Section::make('Description')
                ->schema([
                    Textarea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->placeholder('Brief description of this magazine edition...')
                        ->columnSpanFull(),
                ]),

            Section::make('Cover Image')
                ->schema([
                    FileUpload::make('cover_image')
                        ->label('Cover Image')
                        ->image()
                        ->disk('public')
                        ->directory('magazines')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['2:3', '3:4', 'A4'])
                        ->maxSize(5120)
                        ->helperText('Upload the magazine cover image. Max 5MB. Recommended ratio: A4 (2:3).')
                        ->columnSpanFull(),
                ]),

        ]);
    }
}
