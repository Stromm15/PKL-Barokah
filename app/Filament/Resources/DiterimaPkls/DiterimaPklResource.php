<?php

namespace App\Filament\Resources\DiterimaPkls;

use App\Filament\Resources\DiterimaPkls\Pages\CreateDiterimaPkl;
use App\Filament\Resources\DiterimaPkls\Pages\EditDiterimaPkl;
use App\Filament\Resources\DiterimaPkls\Pages\ListDiterimaPkls;
use App\Filament\Resources\DiterimaPkls\Schemas\DiterimaPklForm;
use App\Filament\Resources\DiterimaPkls\Tables\DiterimaPklsTable;
use App\Models\Pkl;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DiterimaPklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckBadge;

    protected static ?string $navigationLabel = 'Pkl Diterima';

    protected static ?string $label = 'Pkl Diterima';

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->role === 'pembimbing') {
            $query->where('id_pembimbing', Auth::id());
        }

        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return DiterimaPklForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DiterimaPklsTable::configure($table);
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
            'index' => ListDiterimaPkls::route('/'),
            // 'create' => CreateDiterimaPkl::route('/create'),
            // 'edit' => EditDiterimaPkl::route('/{record}/edit'),
        ];
    }
}
