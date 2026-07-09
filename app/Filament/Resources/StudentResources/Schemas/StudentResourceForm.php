<?php

namespace App\Filament\Resources\StudentResources\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class StudentResourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Resource Information')
                ->description('Basic details about this student resource.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Resource Title')
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
                        ->unique(table: 'student_resources', column: 'slug', ignoreRecord: true)
                        ->helperText('Auto-generated from title. Used in the URL: /student-resources/{slug}')
                        ->columnSpanFull(),

                    Select::make('category')
                        ->label('Category')
                        ->required()
                        ->searchable()
                        ->options([
                            'events'      => '📅 Events',
                            'seminar'     => '🎓 Seminar',
                            'workshop'    => '🛠️ Workshop',
                            'scholarship' => '💵 Scholarship',
                            'competition' => '🏆 Competition',
                        ]),

                    Select::make('status')
                        ->label('Publication Status')
                        ->required()
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                            'archived'  => 'Archived',
                        ])
                        ->default('draft'),

                    Select::make('user_id')
                        ->label('Uploaded By (Officer)')
                        ->required()
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->default(fn () => auth()->id()),

                    DateTimePicker::make('published_at')
                        ->label('Publish Date & Time')
                        ->displayFormat('d M Y, H:i')
                        ->seconds(false),

                    TextInput::make('source')
                        ->label('Source / Credit')
                        ->maxLength(255)
                        ->placeholder('e.g. Dosen Matakuliah X, Website resmi, etc.')
                        ->helperText('Credit the original source of this resource if applicable.')
                        ->columnSpanFull(),

                ]),

            Section::make('Resource Description')
                ->schema([

                    Textarea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->maxLength(1000)
                        ->placeholder('What is this resource about? Who is it for? How to use it?')
                        ->helperText('A short description shown on the listing page.')
                        ->columnSpanFull(),

                ]),

            Section::make('Resource File / Link')
                ->description('Upload a file OR provide an external URL. At least one is required.')
                ->columns(1)
                ->schema([

                    FileUpload::make('file_path')
                        ->label('Upload File')
                        ->disk('public')
                        ->directory('student-resources/files')
                        ->acceptedFileTypes([
                            'application/pdf',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.ms-powerpoint',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/zip',
                            'text/plain',
                        ])
                        ->maxSize(20480) // 20MB
                        ->helperText('Accepted: PDF, Word, PowerPoint, Excel, ZIP, TXT. Max 20MB.'),

                    TextInput::make('external_url')
                        ->label('External URL / Link')
                        ->url()
                        ->maxLength(500)
                        ->placeholder('https://...')
                        ->helperText('If the resource is hosted externally (Google Drive, Notion, etc.), paste the link here.'),

                ]),

            Section::make('Thumbnail Image')
                ->schema([

                    FileUpload::make('thumbnail')
                        ->label('Thumbnail / Cover Image')
                        ->image()
                        ->disk('public')
                        ->directory('thumbnails/student-resources')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                        ->maxSize(2048)
                        ->helperText('Recommended: 800×600px. Max 2MB.')
                        ->columnSpanFull(),

                ]),

        ]);
    }
}
