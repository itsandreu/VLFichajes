<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FichajeResource\Pages;
use App\Filament\Resources\FichajeResource\RelationManagers;
use App\Models\Fichaje;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FichajeResource extends Resource
{
    protected static ?string $model = Fichaje::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('user.media')->label('Foto')->circular(),
                TextColumn::make('user.name')->label('Nombre')->sortable()->searchable()->description(function (Fichaje $record) {
                    $user = User::find($record->user_id);
                    if ($user) {
                        $string = $user->apellido1 . " " . $user->apellido2;
                        return $string;
                    }
                    return '';
                }),
                TextColumn::make('hora_entrada_mañana')->label('Entrada')->sortable()->searchable()->color('success'),
                TextColumn::make('hora_salida_mañana')->label('Salida')->sortable()->searchable()->color('danger'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                
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
            'index' => Pages\ListFichajes::route('/'),
            'create' => Pages\CreateFichaje::route('/create'),
            'edit' => Pages\EditFichaje::route('/{record}/edit'),
        ];
    }
}
