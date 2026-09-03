<?php

namespace App\Filament\Resources\Pembimbings;

use App\Filament\Resources\Pembimbings\Pages\CreatePembimbing;
use App\Filament\Resources\Pembimbings\Pages\EditPembimbing;
use App\Filament\Resources\Pembimbings\Pages\ListPembimbings;
use App\Filament\Resources\Pembimbings\Schemas\PembimbingForm;
use App\Filament\Resources\Pembimbings\Tables\PembimbingsTable;
use App\Models\Pembimbing;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PembimbingResource extends Resource
{
    protected static ?string $model = Pembimbing::class;

    protected static ?string $navigationLabel = 'Pembimbing Lapangan';

    protected static UnitEnum|string|null $navigationGroup = 'Master Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_pembimbing';

    public static function form(Schema $schema): Schema
    {
        return PembimbingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PembimbingsTable::configure($table);
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
            'index' => ListPembimbings::route('/'),
            'create' => CreatePembimbing::route('/create'),
            'edit' => EditPembimbing::route('/{record}/edit'),
        ];
    }
}
