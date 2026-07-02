<?php

namespace App\Filament\Resources\JobOpportunities\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class JobOpportunityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Job Details')
                ->description('Basic information about this job opportunity.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Job Title')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('e.g. Content Writer Intern')
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (?string $state, Set $set) =>
                            $set('slug', $state ? Str::slug($state) : '')
                        )
                        ->columnSpanFull(),

                    TextInput::make('slug')
                        ->label('URL Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(table: 'job_opportunities', column: 'slug', ignoreRecord: true)
                        ->helperText('Auto-generated from title. Used in the URL: /job-opportunities/{slug}')
                        ->columnSpanFull(),

                    TextInput::make('company')
                        ->label('Company / Organization')
                        ->required()
                        ->maxLength(150)
                        ->placeholder('e.g. PT Media Kreatif Indonesia'),

                    Select::make('type')
                        ->label('Job Type')
                        ->required()
                        ->options([
                            'full-time'  => '💼 Full-Time',
                            'part-time'  => '⏰ Part-Time',
                            'internship' => '🎓 Internship',
                            'freelance'  => '🌐 Freelance',
                        ]),

                    Select::make('status')
                        ->label('Status')
                        ->required()
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                            'closed'    => 'Closed',
                        ])
                        ->default('draft'),

                    TextInput::make('location')
                        ->label('Location')
                        ->maxLength(150)
                        ->placeholder('e.g. Bandung / Remote / Hybrid'),

                    DatePicker::make('deadline')
                        ->label('Application Deadline')
                        ->displayFormat('d M Y')
                        ->minDate(now()),

                    TextInput::make('apply_url')
                        ->label('Apply URL / Link')
                        ->url()
                        ->maxLength(500)
                        ->placeholder('https://...')
                        ->helperText('Direct link where applicants can apply.')
                        ->columnSpanFull(),

                    Select::make('user_id')
                        ->label('Posted By (Officer)')
                        ->required()
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->default(fn () => auth()->id()),

                ]),

            Section::make('Job Description')
                ->schema([

                    Textarea::make('description')
                        ->label('Job Description')
                        ->rows(8)
                        ->placeholder("Tuliskan deskripsi lengkap lowongan ini:\n\nTentang Posisi:\n...\n\nKualifikasi:\n- ...\n\nTanggung Jawab:\n- ...")
                        ->helperText('Deskripsi lengkap termasuk kualifikasi dan tanggung jawab.')
                        ->columnSpanFull(),

                ]),

            Section::make('Job Thumbnail (Optional)')
                ->schema([

                    FileUpload::make('thumbnail')
                        ->label('Company Logo / Banner')
                        ->image()
                        ->disk('public')
                        ->directory('thumbnails/jobs')
                        ->imageEditor()
                        ->maxSize(1024)
                        ->helperText('Optional. Company logo or job banner image. Max 1MB.')
                        ->columnSpanFull(),

                ]),

        ]);
    }
}