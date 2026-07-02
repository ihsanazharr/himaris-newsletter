<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Article Information')
                ->description('Basic article details and metadata.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Article Title')
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
                        ->unique(table: 'posts', column: 'slug', ignoreRecord: true)
                        ->helperText('Auto-generated from title. Used in the URL: /newsletter/{slug}')
                        ->columnSpanFull(),

                    Select::make('category')
                        ->label('Category')
                        ->required()
                        ->searchable()
                        ->options([
                            'news'             => '📰 News Report',
                            'scholarship'      => '🎓 Scholarship',
                            'announcement'     => '📣 Announcement',
                            'cafe-review'      => '☕ Cafe Review',
                            'alumni'           => '👤 Alumni Profile',
                            'self-improvement' => '🌱 Self-Improvement',
                            'upcoming-event'   => '📅 Upcoming Event',
                            'miscellaneous'    => '✨ Miscellaneous',
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

                    // user_id — pakai officer yang login atau pilih dari daftar user
                    Select::make('user_id')
                        ->label('Author (Officer)')
                        ->required()
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->default(fn () => auth()->id()),

                    DateTimePicker::make('published_at')
                        ->label('Publish Date & Time')
                        ->displayFormat('d M Y, H:i')
                        ->seconds(false),

                ]),

            Section::make('Article Content')
                ->schema([

                    Textarea::make('excerpt')
                        ->label('Excerpt / Summary')
                        ->rows(3)
                        ->maxLength(500)
                        ->placeholder('Short description shown on listing pages...')
                        ->helperText('This will appear as the article preview on the newsletter index page.')
                        ->columnSpanFull(),

                    RichEditor::make('content')
                        ->label('Article Body')
                        ->required()
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('articles/attachments')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'strike',
                            'h2', 'h3',
                            'bulletList', 'orderedList', 'blockquote',
                            'link', 'attachFiles',
                            'undo', 'redo',
                        ])
                        ->columnSpanFull(),

                ]),

            Section::make('Thumbnail / Featured Image')
                ->schema([

                    FileUpload::make('thumbnail')
                        ->label('Thumbnail Image')
                        ->image()
                        ->disk('public')
                        ->directory('thumbnails/posts')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                        ->maxSize(2048)
                        ->helperText('Recommended: 1280×720px (16:9). Max 2MB.')
                        ->columnSpanFull(),

                ]),

        ]);
    }
}