<?php

namespace App\Filament\Resources\Greetings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class GreetingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                RichEditor::make('content')
                    ->label('Isi Sambutan')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'link',
                        'h2',
                        'h3',
                        'blockquote',
                        'redo',
                        'undo',
                    ])
                    ->required()
                    ->helperText('Tulis isi sambutan pimpinan universitas.')
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Foto Pimpinan')
                    ->image()
                    ->directory('greetings')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->maxSize(2048)
                    ->required()
                    ->helperText('Upload foto pimpinan. Format: JPG, PNG. Maks 2MB.')
                    ->columnSpanFull(),
            ]);
    }
}