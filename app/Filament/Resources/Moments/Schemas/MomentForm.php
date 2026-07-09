<?php

namespace App\Filament\Resources\Moments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MomentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Moment Details')
                ->description('Basic information about this moment or photo.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Title / Caption')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('e.g. Tour Jurusan 2025')
                        ->columnSpanFull(),

                    TextInput::make('author_name')
                        ->label('Photographed / Uploaded By')
                        ->maxLength(255)
                        ->placeholder('e.g. Shilma Maudini')
                        ->helperText('Name of the photographer or uploader.'),

                    Select::make('status')
                        ->label('Status')
                        ->required()
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                            'archived'  => 'Archived',
                        ])
                        ->default('draft'),

                    TextInput::make('location')
                        ->label('Location')
                        ->maxLength(255)
                        ->placeholder('e.g. Aula POLBAN, Bandung'),

                    DatePicker::make('date')
                        ->label('Date of Event / Photo')
                        ->displayFormat('d M Y'),

                ]),

            Section::make('Description')
                ->schema([
                    Textarea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->placeholder('Describe what happened in this moment...')
                        ->columnSpanFull(),
                ]),

            Section::make('Photo')
                ->schema([
                    FileUpload::make('thumbnail')
                        ->label('Photo / Image')
                        ->image()
                        ->disk('public')
                        ->directory('moments')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:9', '4:3', '1:1', '3:2'])
                        ->maxSize(4096)
                        ->helperText('Upload the photo for this moment. Max 4MB.')
                        ->columnSpanFull(),
                ]),

        ]);
    }
}
