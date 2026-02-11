<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Configuración Global';
    protected static ?string $title = 'Configuración del Sitio';

    // Custom view is required for standard Pages to render the form
    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        // Merge with defaults for known keys to ensure state exists
        // (This prevents issues where missing keys cause field resets on Livewire updates)
        $defaults = [
            'hero_title' => '',
            'hero_subtitle' => '',
            'site_title' => '',
            'site_subtitle' => '',
            'about_title' => '',
            'about_description' => '',
            'whatsapp_number' => '',
            'phone' => '',
            'instagram_url' => '',
            'facebook_url' => '',
            'tiktok_url' => '',
            'address' => '',
            'map_embed_url' => '',
            'primary_color' => '#9C8974', // Default taupe color
        ];

        $this->form->fill(array_merge($defaults, $settings));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Section::make('Identidad')
            ->schema([
                Forms\Components\TextInput::make('site_title')
                ->label('Título del Sitio')
                ->required(),
                Forms\Components\TextInput::make('site_subtitle')
                ->label('Subtítulo'),
                Forms\Components\ColorPicker::make('primary_color')
                ->label('Color Principal'),
            ])->columns(3),

            Forms\Components\Section::make('Portada (Hero)')
            ->description('Personaliza la imagen y textos de la pantalla principal.')
            ->schema([
                Forms\Components\FileUpload::make('hero_image')
                ->label('Imagen de Portada')
                ->image()
                ->directory('settings')
                ->disk('public')
                ->visibility('public')
                ->columnSpanFull(),
                Forms\Components\TextInput::make('hero_title')
                ->label('Título Principal')
                ->placeholder('Arte en cada detalle.')
                ->helperText('Deja vacío para usar el predeterminado.'),
                Forms\Components\Textarea::make('hero_subtitle')
                ->label('Subtítulo')
                ->placeholder('Elevamos el diseño de uñas...')
                ->rows(2)
                ->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Sobre Mí')
            ->description('Sección "About" en la Landing Page.')
            ->schema([
                Forms\Components\TextInput::make('about_title')
                ->label('Título (Ej: Hola, soy Sofía)')
                ->placeholder('Hola, soy...'),
                Forms\Components\Textarea::make('about_description')
                ->label('Biografía')
                ->rows(5),
                Forms\Components\FileUpload::make('about_image')
                ->label('Foto de Perfil')
                ->image()
                ->directory('settings')
                ->disk('public')
                ->visibility('public')
                ->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Contacto & Mapa')
            ->schema([
                Forms\Components\TextInput::make('whatsapp_number')
                ->label('WhatsApp (549...)')
                ->helperText('Formato internacional sin +'),
                Forms\Components\TextInput::make('phone')
                ->label('Teléfono')
                ->helperText('Número de teléfono para mostrar (ej: +54 9 11 1234-5678)'),
                Forms\Components\TextInput::make('instagram_url')
                ->label('Link Instagram')
                ->url(),
                Forms\Components\TextInput::make('facebook_url')
                ->label('Link Facebook')
                ->url(),
                Forms\Components\TextInput::make('tiktok_url')
                ->label('Link TikTok')
                ->url(),
                Forms\Components\TextInput::make('address')
                ->label('Dirección'),
                Forms\Components\Textarea::make('map_embed_url')
                ->label('Google Maps Embed URL')
                ->helperText('Pega el src del iframe de Google Maps.')
                ->rows(3)
                ->columnSpanFull(),
            ])->columns(2),
        ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            // If the value is null, we can store empty string or skip
            // FileUpload returns path string (or array inside json if multiple)

            // Special handling for array values (if any component returns array)
            if (is_array($value)) {
                $value = json_encode($value);
            }

            Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value ?? '']
            );
        }

        Notification::make()
            ->title('Configuración guardada')
            ->success()
            ->send();
    }
}