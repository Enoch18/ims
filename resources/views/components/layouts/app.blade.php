<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
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
                                ['link' => 'Dashboard', 'endpoint' => route('dashboard'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Product Management', 'endpoint' => route('products.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Inventory Tracking', 'endpoint' => route('inventory.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Order Management', 'endpoint' => route('order-management.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Suppliers', 'endpoint' => route('suppliers.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Locations', 'endpoint' => route('locations.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Reports', 'endpoint' => route('reports.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'User Management', 'endpoint' => route('user-managements.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                                ['link' => 'Settings', 'endpoint' => '/settings', 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ]
                        @endphp

                        @foreach($links as $link)
                            <x-admin.sidebar-link :link="$link" />
                        @endforeach
                    </div>
                    
                    <div class="ml-2 h-[100dvh] w-[100%] pr-2 pl-2 overflow-y-scroll">
                        @livewire('navigation-menu')
                        
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>