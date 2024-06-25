<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataGuruResource\Pages;
use App\Filament\Resources\DataGuruResource\RelationManagers;
use App\Models\DataGuru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataGuruResource extends Resource
{
    protected static ?string $model = DataGuru::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('nip')->required()->unique(),
                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\TextInput::make('no_tlpn')->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(['pns' => 'PNS', 'honorer' => 'Honorer', 'inpasing' => 'Inpasing', 'p3k' => 'P3K'])
                    ->required(),
                Forms\Components\TextInput::make('id_paut')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nip')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('alamat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('no_tlpn')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('id_paut')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListDataGurus::route('/'),
            'create' => Pages\CreateDataGuru::route('/create'),
            'edit' => Pages\EditDataGuru::route('/{record}/edit'),
        ];
    }
}
