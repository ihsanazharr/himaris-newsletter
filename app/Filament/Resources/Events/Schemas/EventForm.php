<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Event Information')
                ->description('Basic event details.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Event Title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (?string $state, Set $set) =>
                            $set('slug', $state ? Str::slug($state) : '')
                        )
                        ->columnSpanFull(),

                    TextInput::make('slug')
                        ->label('URL Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(table: 'events', column: 'slug', ignoreRecord: true)
                        ->helperText('Auto-generated from title. Used in the URL: /student-resources/{slug}')
                        ->columnSpanFull(),

                    Select::make('status')
                        ->label('Status')
                        ->required()
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                            'archived'  => 'Archived',
                        ])
                        ->default('draft'),

                    // user_id — officer yang membuat event
                    Select::make('user_id')
                        ->label('Created By (Officer)')
                        ->required()
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->default(fn () => auth()->id()),

                    TextInput::make('organizer')
                        ->label('Organizer')
                        ->maxLength(150)
                        ->placeholder('e.g. HIMARIS, BEM, Jurusan Bahasa Inggris'),

                    TextInput::make('location')
                        ->label('Location / Venue')
                        ->maxLength(200)
                        ->placeholder('e.g. Aula Gedung D, Online via Zoom'),

                    DateTimePicker::make('start_date')
                        ->label('Start Date & Time')
                        ->required()
                        ->displayFormat('d M Y, H:i')
                        ->seconds(false),

                    DateTimePicker::make('end_date')
                        ->label('End Date & Time')
                        ->displayFormat('d M Y, H:i')
                        ->seconds(false)
                        ->after('start_date'),

                ]),

            Section::make('Event Description')
                ->schema([

                    // Hanya "description" — sesuai fillable model
                    Textarea::make('description')
                        ->label('Event Description')
                        ->rows(6)
                        ->placeholder("Tuliskan detail lengkap event ini:\n- Tentang event\n- Agenda\n- Cara daftar\n- dll.")
                        ->helperText('Deskripsi lengkap event yang ditampilkan di halaman detail.')
                        ->columnSpanFull(),

                ]),

            Section::make('Event Banner / Thumbnail')
                ->schema([

                    FileUpload::make('thumbnail')
                        ->label('Event Banner Image')
                        ->image()
                        ->disk('public')
                        ->directory('thumbnails/events')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:9', '4:3'])
                        ->maxSize(2048)
                        ->helperText('Recommended: 1280×720px (16:9). Max 2MB.')
                        ->columnSpanFull(),

                ]),

        ]);
    }
}