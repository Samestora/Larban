@php
    $slides = [
        [
            'image' => 'https://picsum.photos/800/400',
            'title' => 'Front end developers',
            'description' => 'We love last week frameworks.',
            'url' => '/docs/installation',
            'urlText' => 'Get started',
        ],
        [
            'image' => 'https://picsum.photos/800/400',
            'title' => 'Full stack developers',
            'description' => 'Where burnout is just a fancy term for Tuesday.',
        ],
        [
            'image' => 'https://picsum.photos/800/400',
            'url' => '/docs/installation',
            'urlText' => 'Let`s go!',
        ],
        [
            'image' => 'https://picsum.photos/800/400',
            'url' => '/docs/installation',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'KanbanFlow') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-base dark:bg-base-100 flex flex-col items-center min-h-screen font-sans">

    <header
        class="w-full max-w-7xl flex items-center justify-between py-6 px-6 lg:px-10 mb-12 border-b border-primary dark:border-primary shadow-sm">
        <h1 class="text-2xl font-bold text-primary dark:text-primary">
            {{ config('app.name', 'Larban') }}
        </h1>

        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                <x-mary-theme-toggle class="btn btn-circle btn-ghost" />
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-2 border border-primary dark:border-primary text-sm rounded-md hover:border-primary dark:hover:border-primary transition duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 text-sm  dark: hover: dark:hover: transition duration-200">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-2 border border-primary dark:border-primary text-sm rounded-md hover:border-primary dark:hover:border-primary transition duration-200">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main
        class="text-center max-w-2xl space-y-6 mb-16 px-6 lg:px-10 py-16 bg-primary-100 dark:bg-primary-800 rounded-xl shadow-lg">
        <h2 class="text-5xl font-extrabold leading-tight text-primary-900 dark:">
            Visualize Your Workflow with Ease
        </h2>
        <p class=" dark:text-primary-100 text-xl max-w-xl mx-auto">
            Welcome to {{ config('app.name') }}, a powerful yet simple digital Kanban tool to manage your tasks,
            projects, and teams — all in one visual space.
        </p>
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="btn btn-primary px-10 py-5 font-bold rounded-xl shadow-xl transition transform hover:scale-105 hover:shadow-primary/50 focus:outline-none focus:ring-4 focus:ring-primary dark:focus:ring-primary">
                Get Started for Free
            </a>
        @endif
    </main>

    <section class="w-full max-w-5xl px-6 lg:px-10 mb-16">
        <x-mary-carousel interval="3000" :slides="$slides" autoplay />
    </section>

    <footer class="w-full max-w-7xl text-center py-8 px-6 lg:px-10  dark: text-sm mt-auto">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'KanbanFlow') }}. All rights reserved.</p>
    </footer>

    @livewireScripts
</body>

</html>
