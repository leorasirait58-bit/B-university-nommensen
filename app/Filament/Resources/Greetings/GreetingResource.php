<?php

namespace App\Filament\Resources\Greetings;

use App\Filament\Resources\Greetings\Pages\CreateGreeting;
use App\Filament\Resources\Greetings\Pages\EditGreeting;
use App\Filament\Resources\Greetings\Pages\ListGreetings;
use App\Filament\Resources\Greetings\Schemas\GreetingForm;
use App\Filament\Resources\Greetings\Tables\GreetingsTable;
use App\Models\Greeting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class GreetingResource extends Resource
{
    protected static ?string $model = Greeting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Sambutan';        // ← Label di menu sidebar
    protected static ?string $modelLabel = 'Sambutan';             // ← Label untuk satu item
    protected static ?string $pluralModelLabel = 'Sambutan';       // ← Label untuk banyak item
    protected static string|UnitEnum|null $navigationGroup = 'Manajemen Konten';  // ← Grup menu
    protected static ?int $navigationSort = 2;                        // ← Urutan di menu

    public static function form(Schema $schema): Schema
    {
        return GreetingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GreetingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGreetings::route('/'),
            'create' => CreateGreeting::route('/create'),
            'edit' => EditGreeting::route('/{record}/edit'),
        ];
    }
}
