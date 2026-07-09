<?php

namespace App\Filament\Resources\Posts\Schemas;

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
                            'whats-new'        => "📰 What's New",
                            'self-improvement' => '🌱 Self-Improvement',
                            'entertainment'    => '🎬 Entertainment',
                            'miscellaneous'    => '✨ Miscellaneous',
                            'alumni-profile'   => '👤 Inspirational Alumni & Current Students Profile',
                            'review'           => '⭐ Review',
                            'upcoming-event'   => '📅 Upcoming Event',
                            'sponsored-content'=> '🤝 Sponsored Content',
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

                    TextInput::make('author_name')
                        ->label('Author')
                        ->maxLength(255)
                        ->placeholder('e.g. Nurfalidza Nisrina')
                        ->helperText('Type the author\'s full name — does not need to be a registered user.'),

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