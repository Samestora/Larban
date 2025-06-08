<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Larban') }}</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-base dark:bg-base-300">
    <div class="flex min-h-screen">
        <!-- Left: Form Slot -->
        <div class="w-full md:w-1/2 flex flex-col justify-center px-8 py-12 lg:px-24 bg-base-200 dark:bg-base-200">
            {{ $slot }}
        </div>

        <!-- Right: Image/Promo Panel -->
        <div class="hidden md:flex w-1/2 items-center justify-center bg-primary text-primary-content relative p-10">
            <div class="max-w-md text-center space-y-6">
                <h2 class="text-3xl font-extrabold leading-tight">
                    The simplest way to manage your workforce
                </h2>
                <p class="opacity-90">
                    Enter your credentials to access your account
                </p>

                <img src="{{ asset('storage/guestpanel.png') }}" class="rounded-xl shadow-xl border border-base/20"
                    alt="Dashboard Preview">
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
