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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
                            ['link' => 'Dashboard', 'endpoint' => route('dashboard'), 'icon' => "<i class='fas fa-tachometer-alt'></i>"],
                            ['link' => 'Product Management', 'endpoint' => route('products.list'), 'icon' => "<i class='fas fa-boxes'></i>"],
                            ['link' => 'Inventory Tracking', 'endpoint' => route('inventory.list'), 'icon' => "<i class='fas fa-warehouse'></i>"],
                            ['link' => 'Order Management', 'endpoint' => route('order-management.list'), 'icon' => "<i class='fas fa-receipt'></i>"],
                            ['link' => 'Suppliers', 'endpoint' => route('suppliers.list'), 'icon' => "<i class='fas fa-truck-loading'></i>"],
                            ['link' => 'Warehouses', 'endpoint' => route('warehouses.list'), 'icon' => "<i class='fas fa-building'></i>"],
                            ['link' => 'Reports', 'endpoint' => route('reports.list'), 'icon' => "<i class='fas fa-chart-bar'></i>"],
                            ['link' => 'User Management', 'endpoint' => route('user-managements.list'), 'icon' => "<i class='fas fa-users-cog'></i>"],
                            ['link' => 'Settings', 'endpoint' => '/settings', 'icon' => "<i class='fas fa-cogs'></i>"],
                        ]
                    @endphp

                    <div class="bg-gray-700 w-64 h-[100vh] p-2 relative hidden md:block lg:block xl:block">
                        {{-- Sidebar top user name and role --}}
                        <a href="{{ route('profile.show') }}">
                            <div class="mb-3 flex flex-row gap-2 bg-gray-500 p-3 rounded text-white">
                                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-700">
                                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>

                                <div>
                                    <p class="font-semibold text-md">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
                                    <p class="text-sm">{{implode(",", auth()->user()->roles->pluck('name')->toArray())}}</p>
                                </div>
                            </div>
                        </a><hr />

                        {{-- Sidebar links --}}
                        @foreach($links as $link)
                            <x-admin.sidebar-link :link="$link" />
                        @endforeach


                        {{-- Logout form --}}
                        <form class="absolute bottom-5 w-[100%]" method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button class="p-2 w-[93%] text-white border border-gray-500 rounded flex flex-row items-center gap-2 mt-3">
                                <i class="fas fa-sign-out-alt text-xl"></i> Logout
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