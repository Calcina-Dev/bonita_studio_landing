<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Post;
use App\Models\Video;
use App\Models\Setting;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Settings
        $settings = [
            'site_title' => 'Bonita Studio',
            'site_subtitle' => 'Expertas en belleza y cuidado personal',
            'whatsapp_number' => '5491112345678',
            'instagram_url' => 'https://instagram.com/bonitastudio',
            'address' => 'Av. Corrientes 1234, CABA',
            'phone' => '+54 9 11 1234-5678',
            'primary_color' => '#e11d48', // Rose 600 default
            'about_title' => 'Hola, soy Bonita',
            'about_description' => 'Apasionada por el arte de las uñas y el cuidado personal. Con más de 5 años de experiencia transformando manos y pies.',
            'about_image' => '', // Empty by default
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0168878894544!2d-58.38157042526642!3d-34.60373887295444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4aa9f0a6da5edb%3A0x11bead4e234e558b!2sObelisco!5e0!3m2!1ses!2sar!4v1707000000000!5m2!1ses!2sar',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Services
        // Check if services exist before creating to avoid duplication if run multiple times without fresh
        if (Service::count() === 0) {
            Service::create([
                'name' => 'Esmaltado Semipermanente',
                'description' => 'Duración de hasta 21 días con brillo intenso. Incluye limpieza de cutículas y limado.',
                'price' => 15000,
                'duration' => '60 min',
                'is_active' => true,
                'sort_order' => 1,
            ]);

            Service::create([
                'name' => 'Soft Gel',
                'description' => 'Extensiones de uñas con tips de gel que se adhieren a la uña natural. Ligeras y resistentes.',
                'price' => 22000,
                'duration' => '90 min',
                'is_active' => true,
                'sort_order' => 2,
            ]);

            Service::create([
                'name' => 'Kapping Gel',
                'description' => 'Baño de gel sobre el largo natural para proteger y fortalecer las uñas quebradizas.',
                'price' => 18000,
                'duration' => '75 min',
                'is_active' => true,
                'sort_order' => 3,
            ]);

            Service::create([
                'name' => 'Nail Art Mano Alzada',
                'description' => 'Diseños personalizados y exclusivos pintados a mano alzada. Desde minimalista hasta complejo.',
                'price' => 5000,
                'duration' => '30 min',
                'is_active' => true,
                'sort_order' => 4,
            ]);

            Service::create([
                'name' => 'Pedicura Spa',
                'description' => 'Tratamiento completo para pies con exfoliación, masaje y esmaltado semipermanente.',
                'price' => 20000,
                'duration' => '90 min',
                'is_active' => true,
                'sort_order' => 5,
            ]);
        }

        // Posts
        if (Post::count() === 0) {
            Post::create([
                'title' => '¡Nueva Paleta de Colores de Invierno!',
                'content' => 'Llegaron los tonos oscuros y neones para esta temporada.',
                'type' => 'news',
                'is_active' => true,
                'published_at' => now(),
            ]);

            Post::create([
                'title' => '2x1 en Nail Art',
                'content' => 'Todos los martes aprovechá nuestra promo de diseño a mitad de precio en la segunda unidad.',
                'type' => 'promo',
                'is_active' => true,
                'published_at' => now(),
            ]);
        }

        // Videos
        if (Video::count() === 0) {
            Video::create([
                'title' => 'Proceso de Soft Gel',
                'url' => 'https://www.tiktok.com/@bonitastudio/video/1234567890',
                'platform' => 'tiktok',
                'sort_order' => 1,
                'is_active' => true,
            ]);
        }

        // Products
        if (Product::count() === 0) {
            Product::create([
                'name' => 'Aceite de Cutículas',
                'description' => 'Hidratación profunda con aroma a almendras.',
                'price' => 4500,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            Product::create([
                'name' => 'Crema de Manos Karité',
                'description' => 'Reparación intensiva para pieles secas.',
                'price' => 8200,
                'is_active' => true,
                'sort_order' => 2,
            ]);

            Product::create([
                'name' => 'Kit de Esmaltes Nude',
                'description' => '3 tonos seleccionados para un look natural.',
                'price' => 15000,
                'is_active' => true,
                'sort_order' => 3,
            ]);

            Product::create([
                'name' => 'Lima de Vidrio',
                'description' => 'Duradera y suave con tus uñas naturales.',
                'price' => 3000,
                'is_active' => true,
                'sort_order' => 4,
            ]);

        }

        // Additional Products (Added later)
        $newProducts = [
            [
                'name' => 'Aceite Fortalecedor',
                'description' => 'Para fortalecer y nutrir tus uñas desde la base.',
                'price' => 12000,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Top Coat Brillo Gel',
                'description' => 'Acabado profesional sin lámpara UV.',
                'price' => 9500,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Removedor Suave',
                'description' => 'Sin acetona, con aceites naturales.',
                'price' => 4200,
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($newProducts as $product) {
            Product::firstOrCreate(
            ['name' => $product['name']],
                $product
            );
        }
    }
}