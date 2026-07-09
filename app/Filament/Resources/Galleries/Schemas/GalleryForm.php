<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Photo Information')
                ->description('Add a photo to the gallery.')
                ->columns(2)
                ->schema([

                    TextInput::make('title')
                        ->label('Photo Title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->placeholder('Briefly describe this photo...')
                        ->helperText('This text will appear alongside the body images on the detail page.')
                        ->columnSpanFull(),

                    DatePicker::make('date')
                        ->label('Photo Date')
                        ->displayFormat('d M Y'),

                    TextInput::make('location')
                        ->label('Location')
                        ->maxLength(255)
                        ->placeholder('e.g. Aula Gedung D, POLBAN'),

                    Select::make('status')
                        ->label('Status')
                        ->required()
                        ->options([
                            'draft'     => 'Draft',
                            'published' => 'Published',
                            'archived'  => 'Archived',
                        ])
                        ->default('draft'),

                    TextInput::make('author_name')
                        ->label('Artwork By / Uploaded By')
                        ->maxLength(255)
                        ->placeholder('e.g. Shilma Maudini')
                        ->helperText('Name of the artist or uploader — any name, no account needed.'),

                ]),

            Section::make('Thumbnail')
                ->description('Shown on the gallery grid / listing page.')
                ->schema([

                    FileUpload::make('image')
                        ->label('Thumbnail Photo')
                        ->image()
                        ->required()
                        ->disk('public')
                        ->directory('gallery/thumbnails')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['4:3', '16:9', '1:1'])
                        ->maxSize(4096)
                        ->helperText('Displayed in the gallery grid. Recommended: 800×600px. Max 4MB.')
                        ->columnSpanFull(),

                ]),

            Section::make('Body Images')
                ->description('Add one or more images that will appear inside the detail page, distributed between paragraphs of your description.')
                ->schema([

                    Repeater::make('body_images')
                        ->label('Body Images (Multiple Supported)')
                        ->schema([

                            FileUpload::make('image')
                                ->label('Image')
                                ->image()
                                ->disk('public')
                                ->directory('gallery/body')
                                ->imageEditor()
                                ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                                ->maxSize(4096)
                                ->helperText('Max 4MB per image.')
                                ->columnSpanFull(),

                            TextInput::make('alt')
                                ->label('Alt Text')
                                ->maxLength(255)
                                ->placeholder('Describe the image for accessibility')
                                ->helperText('Recommended for accessibility and SEO.'),

                            TextInput::make('copyright')
                                ->label('Copyright / Credit')
                                ->maxLength(255)
                                ->placeholder('e.g. Photo by Himaris Team'),

                            Textarea::make('caption')
                                ->label('Caption')
                                ->rows(2)
                                ->maxLength(500)
                                ->placeholder('Optional caption shown below the image')
                                ->columnSpanFull(),

                        ])
                        ->columns(2)
                        ->collapsible()
                        ->collapsed()
                        ->addActionLabel('+ Add Another Image')
                        ->orderColumn(false)
                        ->columnSpanFull(),

                ]),

        ]);
    }
}
