<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make('Información del Producto')
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre del Producto')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('price')
                ->label('Precio')
                ->numeric()
                ->prefix('$')
                ->required(),
                Forms\Components\Textarea::make('description')
                ->label('Descripción')
                ->rows(3)
                ->columnSpanFull(),
                Forms\Components\FileUpload::make('image_path')
                ->label('Imagen del Producto')
                ->image()
                ->directory('products')
                ->disk('public')
                ->columnSpanFull(),
                Forms\Components\TextInput::make('buy_link')
                ->label('Link de Compra / WhatsApp')
                ->url()
                ->suffixIcon('heroicon-m-globe-alt')
                ->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Visibilidad')
            ->schema([
                Forms\Components\Toggle::make('is_active')
                ->label('Visible en el catálogo')
                ->default(true),
                Forms\Components\TextInput::make('sort_order')
                ->label('Orden')
                ->numeric()
                ->default(0),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\ImageColumn::make('image_path')->label('Imagen'),
            Tables\Columns\TextColumn::make('name')->label('Nombre')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('price')->money('USD')->label('Precio')->sortable(),
            Tables\Columns\ToggleColumn::make('is_active')->label('Activo'),
            Tables\Columns\TextColumn::make('sort_order')->label('Orden')->sortable(),
        ])
            ->filters([
            //
        ])
            ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
            ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
            ->defaultSort('sort_order', 'asc');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}