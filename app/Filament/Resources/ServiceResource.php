<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Servicios';
    protected static ?string $modelLabel = 'Servicio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->label('Precio (Inicio)')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('duration')
                    ->label('Duración')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cover_image')
                    ->label('Imagen de Portada')
                    ->image()
                    ->directory('services')
                    ->disk('public'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo')
                    ->required()
                    ->default(true),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Orden')
                    ->required()
                    ->numeric()
                    ->default(0),

                Forms\Components\Section::make('Galería de Resultados')
                    ->schema([
                        Forms\Components\Repeater::make('media')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('file_path')
                                    ->label('Archivo')
                                    ->image()
                                    ->directory('service_media')
                                    ->disk('public')
                                    ->required(),
                                Forms\Components\Select::make('type')
                                    ->label('Tipo')
                                    ->options([
                                        'image' => 'Imagen',
                                        'video' => 'Video',
                                    ])
                                    ->default('image')
                                    ->required(),
                                Forms\Components\TextInput::make('sort_order')
                                    ->label('Orden')
                                    ->numeric()
                                    ->default(0),
                            ])
                            ->columns(2)
                            ->grid(2)
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Portada'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Precio')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duración')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Activo'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Orden')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->defaultSort('sort_order', 'asc')
            ->reorderable('sort_order');
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}