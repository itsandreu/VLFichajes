<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    TextInput::make('apellido1')->required()->maxLength(255)->label('Primer Apellido'),
                    TextInput::make('apellido2')->required()->maxLength(255)->label('Segundo Apellido'),
                    TextInput::make('email')
                        ->label('Dirección de Correo')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('afiliacion')->required()->label('Numero de Afiliación'),
                    TextInput::make('nif')->required()->label('NIF'),
                ])->columnSpan(2)->columns(2),
                Card::make()
                ->schema([
                    TextInput::make('password')->label('Contraseña')
                        ->password()
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->minLength(8)
                        ->same('passwordConfirmation')
                        ->dehydrated(fn ($state) => filled ($state))
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    TextInput::make('passwordConfirmation')
                        ->password()
                        ->label('Confirmar Contraseña')
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->minLength(8)
                        ->dehydrated(false),
                    Select::make('role')->label('Rol')
                        ->options([
                            'Admin' => 'Admin',
                            'Employee' => 'Employee',
                            'Viewer' => 'Viewer'
                        ])->required(),
                ])->columnSpan(2),
                Card::make()
                ->schema([
                FileUpload::make('media')->label('Foto')
                ->disk('public')
                ->getUploadedFileNameForStorageUsing(fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                ->prepend('Avatar-'),)
                ->imageEditor()
                ->circleCropper()
                ->directory('UsersPhoto')->columnSpan(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('media')->label('Foto')->circular()->disk('public'),
                TextColumn::make('name')->label('Nombre')->sortable()->searchable(),
                TextColumn::make('email')->label('Correo')->sortable()->searchable(),
                TextColumn::make('role')->label('Rol')->sortable()->searchable(),
                //TextColumn::make('role')->label('Role')->badge()->color('success'),
                TextColumn::make('created_at')->label('Creado El')->sortable()->searchable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
