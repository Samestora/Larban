@php
    $slides = [
        [
            'image' => 'https://picsum.photos/800/400?random=1',
            'title' => 'Organize Your Tasks',
            'description' => 'Transform chaos into clarity with our intuitive Kanban boards.',
        ],
        [
            'image' => 'https://picsum.photos/800/400?random=2',
            'title' => 'Collaborate Seamlessly',
            'description' => 'Work together with your team in real-time, anywhere.',
        ],
        [
            'image' => 'https://picsum.photos/800/400?random=3',
            'title' => 'Track Progress Easily',
            'description' => 'Visualize your workflow and boost productivity.',
        ],
        [
            'image' => 'https://picsum.photos/800/400?random=4',
            'title' => 'Achieve More Together',
            'description' => 'From planning to completion, manage everything efficiently.',
        ],
    ];

    $features = [
        [
            'icon' => '📋',
            'title' => 'Visual Task Management',
            'description' => 'Drag and drop tasks between columns to track progress visually.',
        ],
        [
            'icon' => '👥',
            'title' => 'Team Collaboration',
            'description' => 'Invite team members and work together in real-time.',
        ],
        [
            'icon' => '📊',
            'title' => 'Progress Tracking',
            'description' => 'Monitor project progress with detailed analytics and reports.',
        ],
        [
            'icon' => '🔄',
            'title' => 'Workflow Automation',
            'description' => 'Automate repetitive tasks and focus on what matters most.',
        ],
        [
            'icon' => '📱',
            'title' => 'Mobile Responsive',
            'description' => 'Access your boards anywhere, anytime, on any device.',
        ],
        [
            'icon' => '🔐',
            'title' => 'Secure & Private',
            'description' => 'Your data is protected with enterprise-grade security.',
        ],
    ];

    $testimonials = [
        [
            'name' => 'Putranto Surya',
            'role' => 'Project Manager',
            'company' => 'TechCorp',
            'message' => 'Larban transformed how our team manages projects. The visual workflow is game-changing!',
        ],
        [
            'name' => 'Rifu Kanban',
            'role' => 'Development Lead',
            'company' => 'Startup SRT',
            'message' => 'Simple yet powerful, our productivity increased by 40% since using Larban.',
        ],
        [
            'name' => 'Dedep Flow',
            'role' => 'Marketing Director',
            'company' => 'Creative Agency',
            'message' => 'The best Kanban tool we have used. Clean interface and great collaboration features.',
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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

    <main class="text-center max-w-2xl space-y-6 mb-16 px-6 lg:px-10 py-16 bg-base dark:bg-base rounded-xl shadow-lg">
        <h2 class="text-5xl font-extrabold leading-tight text-primary dark:text-primary">
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
        <a href="#features"
            class="btn btn-primary px-10 py-5 font-bold rounded-xl shadow-xl transition transform hover:scale-105 hover:shadow-primary/50 focus:outline-none focus:ring-4 focus:ring-primary dark:focus:ring-primary">
            Learn More
        </a>

        <div class="flex justify-center items-center space-x-4 mt-4 mx-auto">
            <div class="text-center">
                <div class="text-xl font-bold counter" data-target="10000" data-suffix="K+">0</div>
                <div class="text-sm opacity-80">Active Users</div>
            </div>
            <div class="text-center">
                <div class="text-xl font-bold counter" data-target="50000" data-suffix="K+">0</div>
                <div class="text-sm opacity-80">Tasks Completed</div>
            </div>
            <div class="text-center">
                <div class="text-xl font-bold counter" data-target="99.9" data-suffix="%">0</div>
                <div class="text-sm opacity-80">Uptime</div>
            </div>
        </div>
    </main>

    <section id="features" class="w-full max-w-6xl px-6 lg:px-10 mb-16">
        <div class="text-center mb-12">
            <h3 class="text-4xl font-extrabold leading-tight text-primary dark:text-primary">Why Choose Larban?</h3>
            <p class="text-xl text-base-200 dark:text-base max-w-2xl mx-auto">
                Discover the features that make Larban the perfect choice for your team's productivity.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($features as $feature)
                <div
                    class="feature-card bg-base dark:bg-base rounded-xl p-6 shadow-lg border border-primary dark:border-primary">
                    <div class="text-4xl mb-4">{{ $feature['icon'] }}</div>
                    <h4 class="text-xl font-semibold text-primary dark:text-primary mb-3">{{ $feature['title'] }}</h4>
                    <p class="text-gray-600 dark:text-gray-300">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="w-full max-w-6xl px-6 lg:px-10 mb-16">
        <div class="text-center mb-12">
            <h3 class="text-4xl font-extrabold leading-tight text-primary dark:text-primary">What Our Users Say</h3>
            <p class="text-xl dark:text-base">
                Join thousands of satisfied users who have transformed their workflow with Larban.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($testimonials as $testimonial)
                <div
                    class="testimonial-card bg-base dark:bg-base rounded-xl p-6 shadow-lg border border-primary dark:border-primary">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-base font-bold">
                            {{ substr($testimonial['name'], 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <div class="font-semibold text-primary dark:text-primary">{{ $testimonial['name'] }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ $testimonial['role'] }} at
                                {{ $testimonial['company'] }}</div>
                        </div>
                    </div>
                    <p class="text-base dark:text-base italic">"{{ $testimonial['message'] }}"</p>
                    <div class="flex text-primary mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="w-full max-w-5xl px-6 lg:px-10 mb-16">
        <x-mary-carousel interval="3000" :slides="$slides" autoplay />
    </section>

    <footer class="w-full max-w-7xl text-center py-8 px-6 lg:px-10  dark: text-sm mt-auto">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'KanbanFlow') }}. All rights reserved.</p>
    </footer>

    @livewireScripts

</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            const target = parseFloat(counter.dataset.target);
            const suffix = counter.dataset.suffix || '';
            const increment = target / 100;
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current >= target) {
                    current = target;
                }

                if (suffix.includes('K+')) {
                    counter.textContent = Math.floor(current / 1000) + 'K+';
                } else if (suffix === '%') {
                    counter.textContent = current.toFixed(1) + '%';
                } else {
                    counter.textContent = Math.floor(current) + suffix;
                }

                if (current < target) {
                    requestAnimationFrame(updateCounter);
                }
            };

            updateCounter();
        });
    });
</script>

</html>
