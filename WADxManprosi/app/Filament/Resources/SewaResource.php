<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SewaResource\Pages;
use App\Filament\Resources\SewaResource\RelationManagers;
use App\Models\Sewa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SewaResource extends Resource
{
    protected static ?string $model = Sewa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_sewa')->required(),
                Forms\Components\TextInput::make('deskripsi')->required(),
                Forms\Components\TextInput::make('stok')->required(),
                Forms\Components\FileUpload::make('gambar')->required(),
                Forms\Components\TextInput::make('harga')->required(),
                Forms\Components\DatePicker::make('tanggal_mulai_sewa')
                    ->required()
                    ->native(false),
                Forms\Components\DatePicker::make('tanggal_akhir_sewa')
                    ->required()
                    ->native(false)
                    ->afterOrEqual('tanggal_mulai_sewa'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_sewa'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('stok'),
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('harga'),
                Tables\Columns\TextColumn::make('tanggal_mulai_sewa')
                    ->date(),
                Tables\Columns\TextColumn::make('tanggal_akhir_sewa')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSewas::route('/'),
            'create' => Pages\CreateSewa::route('/create'),
            'edit' => Pages\EditSewa::route('/{record}/edit'),
        ];
    }
}
