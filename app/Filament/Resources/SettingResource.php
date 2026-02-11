<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Configuración';
    protected static ?string $modelLabel = 'Ajuste';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('key')
            ->label('Clave')
            ->required()
            ->disabledOn('edit') // Clave clave no se edita después de crear
            ->maxLength(255),
            Forms\Components\Textarea::make('value')
            ->label('Valor')
            ->rows(5)
            ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('key')
            ->label('Clave')
            ->searchable()
            ->sortable(),
            Tables\Columns\TextColumn::make('value')
            ->label('Valor')
            ->limit(50),
            Tables\Columns\TextColumn::make('updated_at')
            ->label('Última Actualización')
            ->dateTime()
            ->sortable(),
        ])
            ->filters([
            //
        ])
            ->actions([
            Tables\Actions\EditAction::make(),
        ])
            ->bulkActions([
            // Disable delete for settings usually, or keep it if needed.
            // Keeping it for now but maybe restricted in production policy.
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}