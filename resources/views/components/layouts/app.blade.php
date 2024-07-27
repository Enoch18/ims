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
        <div class="min-h-screen main-theme">
            <main>
                <div class="flex flex-row">
                    @php 
                        $links = [
                            ['link' => 'Dashboard', 'endpoint' => route('dashboard'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Product Management', 'endpoint' => route('products.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Inventory Tracking', 'endpoint' => route('inventory.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Order Management', 'endpoint' => route('order-management.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Suppliers', 'endpoint' => route('suppliers.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Warehouses', 'endpoint' => route('warehouses.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Reports', 'endpoint' => route('reports.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'User Management', 'endpoint' => route('user-managements.list'), 'icon' => "<i class='fa fa-dashboard'></i>"],
                            ['link' => 'Settings', 'endpoint' => '/settings', 'icon' => "<i class='fa fa-dashboard'></i>"],
                        ]
                    @endphp

                    <div class="bg-gray-700 w-64 h-[100vh] p-2 relative hidden md:block lg:block xl:block">
                        @foreach($links as $link)
                            <x-admin.sidebar-link :link="$link" />
                        @endforeach


                        {{-- Logout form --}}
                        <form class="absolute bottom-5 w-[100%]" method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button class="p-2 w-[93%] text-white border border-gray-500 rounded flex flex-row items-center gap-2 mt-3">
                                <i class="fa fa-sign-out text-xl"></i> Logout
                            </button>
                        </form>
                    </div>
                    
                    <div class="h-[100dvh] w-[100%] overflow-y-scroll ab">
                        <x-admin.navigation-bar 
                            :links="$links"
                        />
                        
                        <div class="p-3">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>