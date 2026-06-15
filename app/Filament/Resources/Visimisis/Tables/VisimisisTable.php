<?php

namespace App\Filament\Resources\Visimisis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;
use Filament\Tables\Table;

class VisimisisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            ImageColumn::make('image')
                ->label('Foto')
                ->disk('public')
                ->height(50)
                ->stacked()
                ->limit(3)
                ->limitedRemainingText(),

            TextColumn::make('visi')
                ->label('Visi')
                ->formatStateUsing(fn (?string $state): string => Str::limit(strip_tags($state ?? ''), 60))
                ->wrap()
                ->searchable(),

            TextColumn::make('misi')
                ->label('Misi')
                ->formatStateUsing(fn (?string $state): string => Str::limit(strip_tags($state ?? ''), 60))
                ->wrap()
                ->toggleable(),

            TextColumn::make('updated_at')
                ->label('Diperbarui')
                ->dateTime('d M Y H:i')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }
}
