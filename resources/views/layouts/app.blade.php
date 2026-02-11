<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bonita Studio') }} - @yield('title', 'Beauty & Nails')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpeg">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        :root {

            /* Fallback to rose-600 if not set */
            /* Fallback to rose-600 if not set */
            --color-brand: {
                    {
                    $settings['primary_color'] ?? '#e11d48'
                }
            }

            ;
            --color-brand-hover: color-mix(in srgb, var(--color-brand), black 10%);
        }
    </style>
    @stack('styles')
</head>

<body class="font-sans antialiased text-gray-900 bg-white selection:bg-brand selection:text-white overflow-x-hidden">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('modals')

    @stack('scripts')
</body>

</html>