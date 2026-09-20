<?php

namespace App\Filament\Resources\Pkls;

use App\Filament\Resources\Pkls\Pages\CreatePkl;
use App\Filament\Resources\Pkls\Pages\EditPkl;
use App\Filament\Resources\Pkls\Pages\ListPkls;
use App\Filament\Resources\Pkls\Schemas\PklForm;
use App\Filament\Resources\Pkls\Tables\PklsTable;
use App\Models\Pkl;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $navigationLabel = 'Pkl';

    protected static ?string $label = 'Pkl';

    protected static ?string $recordTitleAttribute = 'nis';

    public static function canAccess(): bool
    {
        return Auth::user()->role === 'admin';
    }

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
            // 'edit' => EditPkl::route('/{record}/edit'),
        ];
    }
}
