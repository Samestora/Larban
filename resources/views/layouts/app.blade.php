<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Larban') }}</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body x-data="layout()" x-init="init()" class="bg-base-300 text-base-content font-sans antialiased">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside x-cloak
            class="z-30 w-72 bg-base-100 border-r border-base-300 transform transition-transform duration-200 ease-in-out
           fixed inset-y-0 left-0 
           lg:sticky lg:top-0 lg:h-screen lg:translate-x-0 lg:transform-none"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"
            @click.away="sidebarOpen = false">
            @include('layouts.sidebar')
        </aside>


        {{-- Main Layout --}}
        <div class="flex-1 flex flex-col">
            {{-- Topbar --}}
            <header class="bg-base-100 border-b border-base-300 h-16 flex items-center justify-between px-6">
                @include('layouts.topbar')
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- UI Utilities --}}
    <x-mary-toast />
    @stack('modals')
    <script>
        function layout() {
            return {
                sidebarOpen: window.innerWidth >= 1024,
                mobileNavOpen: false,
                init() {
                    window.addEventListener('resize', () => {
                        this.sidebarOpen = window.innerWidth >= 1024;
                    });
                },
                toggleSidebar() {
                    this.sidebarOpen = !this.sidebarOpen;
                },
                toggleMobileNav() {
                    this.mobileNavOpen = !this.mobileNavOpen;
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    @livewireScripts
</body>

</html>
