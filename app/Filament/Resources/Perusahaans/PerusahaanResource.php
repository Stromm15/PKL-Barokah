<?php

namespace App\Filament\Resources\Perusahaans;

use App\Filament\Resources\Perusahaans\Pages\CreatePerusahaan;
use App\Filament\Resources\Perusahaans\Pages\EditPerusahaan;
use App\Filament\Resources\Perusahaans\Pages\ListPerusahaans;
use App\Filament\Resources\Perusahaans\Schemas\PerusahaanForm;
use App\Filament\Resources\Perusahaans\Tables\PerusahaansTable;
use App\Models\Perusahaan;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;

    protected static ?string $navigationLabel = 'Perusahaan Mitra';
    protected static UnitEnum|string|null $navigationGroup = 'Master Data';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'nama_perusahaan';

    public static function form(Schema $schema): Schema
    {
        return PerusahaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerusahaansTable::configure($table);
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
            'index' => ListPerusahaans::route('/'),
            'create' => CreatePerusahaan::route('/create'),
            'edit' => EditPerusahaan::route('/{record}/edit'),
        ];
    }
}
