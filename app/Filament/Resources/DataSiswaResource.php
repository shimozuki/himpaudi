<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataSiswaResource\Pages;
use App\Filament\Resources\DataSiswaResource\RelationManagers;
use App\Models\DataSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataSiswaResource extends Resource
{
    protected static ?string $model = DataSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('nisn')->required()->unique(),
                Forms\Components\DatePicker::make('tempat_tanggal_lahir')->required(),
                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\TextInput::make('agama')->required(),
                Forms\Components\TextInput::make('no_tlpn_wali')->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                Forms\Components\TextInput::make('nama_wali')->required(),
                Forms\Components\TextInput::make('id_paut')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nisn')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tempat_tanggal_lahir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('alamat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('agama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('no_tlpn_wali')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_wali')->sortable()->searchable(),
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
            'index' => Pages\ListDataSiswas::route('/'),
            'create' => Pages\CreateDataSiswa::route('/create'),
            'edit' => Pages\EditDataSiswa::route('/{record}/edit'),
        ];
    }
}
