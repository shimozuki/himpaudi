<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PautResource\Pages;
use App\Filament\Resources\PautResource\RelationManagers;
use App\Models\Paut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PautExport;
use App\Models\Kecamatan;
use Filament\Tables\Columns\TextColumn;

class PautResource extends Resource
{
    protected static ?string $model = Paut::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Paud';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_paud')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_berdiri')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('nama_yayasan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_siswa')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_guru')
                    ->required(),
                Forms\Components\Select::make('id_kecamatan')
                    ->label('Kecamatan')
                    ->options(Kecamatan::all()->pluck('nama_kecamatan', 'id'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_paud')->sortable()->searchable(),
                TextColumn::make('tahun_berdiri')->sortable()->searchable(),
                TextColumn::make('nama_yayasan')->sortable()->searchable(),
                TextColumn::make('jumlah_siswa')->sortable()->searchable(),
                TextColumn::make('jumlah_guru')->sortable()->searchable(),
                TextColumn::make('kecamatan.nama_kecamatan')->label('Kecamatan')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('export')
                    ->label('Export')
                    ->icon('heroicon-s-circle-stack')
                    ->color('success')
                    ->action('export'),
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
            'index' => Pages\ListPauts::route('/'),
            'create' => Pages\CreatePaut::route('/create'),
            'edit' => Pages\EditPaut::route('/{record}/edit'),
        ];
    }

    public function export()
    {
        return Excel::download(new PautExport, 'paut.xlsx');
    }
}
