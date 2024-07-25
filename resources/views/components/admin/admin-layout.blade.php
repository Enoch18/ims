<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <main>
                <div class="flex flex-row">
                    <div class="bg-gray-700 w-64 h-[100dvh] p-2">
                        @php 
                            $links = [
                                ['link' => 'Dashboard', 'endpoint' => '/dashboard', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Inventory', 'endpoint' => '/inventory', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Orders', 'endpoint' => '/orders', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Suppliers', 'endpoint' => '/suppliers', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Locations', 'endpoint' => '/locations', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Reports', 'endpoint' => '/reports', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'User Management', 'endpoint' => '/locations', 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Settings', 'endpoint' => '/settings', 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ]
                        @endphp

                        <x-admin.sidebar-link :links="$links" />
                    </div>
                    
                    <div class="ml-5 h-[100dvh] w-[100%] pr-2">
                        <div class="flex flex-row gap-3 pt-3">
                            <div>
                                <h1 class="text-2xl">IMS</h1>
                            </div>

                            <div class="flex flex-row flex-1 ml-10">
                                <x-admin.search />
                            </div>
                        </div>

                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
