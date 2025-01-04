<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlatPertanianResource\Pages;
use App\Filament\Resources\AlatPertanianResource\RelationManagers;
use App\Models\AlatPertanian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlatPertanianResource extends Resource
{
    protected static ?string $model = AlatPertanian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_alat')->required(),
                Forms\Components\TextInput::make('deskripsi')->required(),
                Forms\Components\TextInput::make('stok')->required(),
                Forms\Components\FileUpload::make('gambar')->required(),
                Forms\Components\TextInput::make('harga')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_alat'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('stok'),
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('harga'),

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
            'index' => Pages\ListAlatPertanians::route('/'),
            'create' => Pages\CreateAlatPertanian::route('/create'),
            'edit' => Pages\EditAlatPertanian::route('/{record}/edit'),
        ];
    }
}
