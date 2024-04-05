<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FichajeResource;
use App\Models\Fichaje;
use App\Models\User;
use Filament\Forms\Components\Builder;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Stringable;

class UltimosFichajes extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $userId = auth()->id();
        return $table
            ->query(function () use ($userId) {
                return Fichaje::where('user_id', $userId);
            })->defaultPaginationPageOption(5)->defaultSort('hora_entrada_mañana', 'desc')
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
                TextColumn::make('Day')->label('Dia')->sortable()->searchable(),
                TextColumn::make('hora_entrada_mañana')->time()->label('Entrada Mañana')->sortable()->searchable()->color('success'),
                TextColumn::make('hora_salida_mañana')->time()->label('Salida Mañana')->sortable()->searchable()->color('danger'),
                TextColumn::make('hora_entrada_tarde')->time()->label('Entrada Tarde')->sortable()->searchable()->color('success'),
                TextColumn::make('hora_salida_tarde')->time()->label('Salida Tarde')->sortable()->searchable()->color('danger'),
                // TextColumn::make('Mesyano')->label('MES Y AÑO ')->sortable()->searchable()->color('danger'),
            ])->poll('1s');
            // ->groups([
            //     // Group::make('Mesyano'),
            // ])
            ;
            // 
    }
}
