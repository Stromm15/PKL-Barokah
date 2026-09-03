<?php

namespace App\Filament\Resources\Pkls;

use App\Filament\Resources\Pkls\Pages\CreatePkl;
use App\Filament\Resources\Pkls\Pages\EditPkl;
use App\Filament\Resources\Pkls\Pages\ListPkls;
use App\Filament\Resources\Pkls\Schemas\PklForm;
use App\Filament\Resources\Pkls\Tables\PklsTable;
use App\Models\Pkl;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationLabel = 'PKL (Praktik Kerja Lapangan)';
    protected static UnitEnum|string|null $navigationGroup = 'Operasional';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id_pkl';

    public static function form(Schema $schema): Schema
    {
        return PklForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PklsTable::configure($table);
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
            'index' => ListPkls::route('/'),
            'create' => CreatePkl::route('/create'),
            'edit' => EditPkl::route('/{record}/edit'),
        ];
    }
}
