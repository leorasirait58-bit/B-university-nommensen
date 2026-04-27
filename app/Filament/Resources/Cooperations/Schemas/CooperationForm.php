<?php

namespace App\Filament\Resources\Cooperations\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class CooperationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                FileUpload::make('image')
                    ->label('Logo Kerja Sama')
                    ->image()
                    ->directory('cooperations')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->required()
                    ->helperText('Upload logo mitra. Format: JPG, PNG. Maks 2MB.')
                    ->columnSpanFull(),
            ]);
    }
}