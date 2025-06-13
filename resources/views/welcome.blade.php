@php
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
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Larban') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-base-100 dark:bg-base-300 text-base-content font-sans antialiased">
    <!-- HEADER -->
    <header class="w-full">
        <div class="w-full max-w-7xl mx-auto px-6 lg:px-10 py-10 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-primary">{{ config('app.name', 'Larban') }}</h1>
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    <x-mary-theme-toggle class="btn btn-circle btn-ghost" lightTheme="Bones" darkTheme="Moonlight" />
                    @auth
                        <a href="{{ url('/dashboard') }}" wire:navigate.hover
                            class="btn btn-outline btn-primary text-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" wire:navigate.hover class="text-sm hover:text-primary transition">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary text-sm">Start Now</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- HERO -->
    <section class="w-full max-w-6xl mx-auto px-6 lg:px-10 py-20 text-center space-y-6">
        <span class="text-sm font-medium text-base-content/70 uppercase tracking-widest">Create Fast</span>
        <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight text-primary">
            One tool to manage task and your team
        </h2>
        <p class="text-lg text-base-content  max-w-2xl mx-auto">
            Larban helps teams move faster and smarter — with visual task management, automation, and insights.
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="{{ route('register') }}" class="btn btn-primary px-8 py-3 text-lg font-semibold rounded-lg">Start
                for Free</a>
            <a href="#features" class="btn btn-outline btn-primary px-8 py-3 text-lg font-semibold rounded-lg">Get a
                Demo</a>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="bg-base-300 dark:bg-base-200">
        <div class="py-20 px-6 lg:px-10 max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <h3 class="text-3xl md:text-4xl font-extrabold mb-3 text-primary">Latest advanced technologies to ensure
                    everything you need</h3>
                <p class="text-lg text-base-content max-w-2xl mx-auto">
                    Maximize your team's productivity with our affordable, user-friendly Kanban management
                    system.
                </p>
            </div>

            <!-- Grid Container -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Main Feature -->
                <div
                    class="bg-base-100 rounded-xl shadow p-8 flex flex-col lg:flex-row justify-between items-start gap-6">
                    <div>
                        <h4 class="text-2xl font-semibold text-primary mb-2">Dynamic dashboard</h4>
                        <p class="text-base-content mb-4">
                            Larban helps teams move faster, smarter and more efficiently — delivering the visibility and
                            data-driven insights to mitigate risk and ensure progress.
                        </p>
                        <a href="#" class="btn btn-primary">Explore all</a>
                    </div>
                    <div class="w-full lg:w-auto flex justify-center">
                        <!-- Fake Chart -->
                        <div class="bg-base-200 p-4 rounded-xl shadow w-full max-w-xs">
                            <div class="flex justify-between items-center text-sm mb-3">
                                <span class="font-bold">Lorem Inc.</span>
                                <div class="flex -space-x-2">
                                    @for ($i = 0; $i < 4; $i++)
                                        <img src="https://i.pravatar.cc/30?u={{ $i }}"
                                            class="h-6 w-6 rounded-full border border-base-100">
                                    @endfor
                                </div>
                            </div>
                            <div class="h-32 flex items-end gap-1">
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="w-2 bg-primary/30 {{ $i == 5 ? 'bg-primary h-24' : 'h-12' }} rounded">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="bg-base-100 rounded-xl shadow p-8">
                    <h4 class="text-xl font-semibold text-primary mb-2">Smart notifications</h4>
                    <p class="text-base-content  mb-6">Stay updated via email, calendar, or notification
                        center — wherever your team needs you.</p>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span>New messages, comments or replies</span>
                            <input type="checkbox" class="toggle toggle-success" checked>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Social emails</span>
                            <input type="checkbox" class="toggle toggle-success">
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Announcements and updates</span>
                            <input type="checkbox" class="toggle toggle-success" checked>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Reminders</span>
                            <input type="checkbox" class="toggle toggle-success" checked>
                        </div>
                    </div>
                </div>

                <!-- Task Management -->
                <div class="bg-base-100 rounded-xl shadow p-8">
                    <h4 class="text-xl font-semibold text-primary mb-2">Task management</h4>
                    <p class="text-base-content  mb-6">Discuss contract queries, manage tasks, secure
                        approvals, track progress in the workspace.</p>

                    <div class="space-y-4">
                        <div class="bg-base-200 p-4 rounded shadow-sm">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pravatar.cc/30?u=100" class="h-8 w-8 rounded-full">
                                <div>
                                    <div class="text-sm font-semibold">Bill Sanders</div>
                                    <div class="text-sm text-base-content/80">Hello <strong>@Ragip Diller</strong>,
                                        could you sign the contract before March 12? 🙏</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-base-200 p-4 rounded shadow-sm">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pravatar.cc/30?u=200" class="h-8 w-8 rounded-full">
                                <div>
                                    <div class="text-sm font-semibold">Jane Cooper</div>
                                    <div class="text-sm text-base-content/80">Uploaded new contract</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar -->
                <div class="bg-base-100 rounded-xl shadow p-8">
                    <h4 class="text-xl font-semibold text-primary mb-2">Smart Schedule</h4>
                    <p class="text-base-content  mb-6">Making plans ahead of time together with your team has never been
                        this easy.</p>

                    <div class="space-y-4">
                        <div class="bg-base-200 p-4 rounded shadow-sm">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pravatar.cc/30?u=100" class="h-8 w-8 rounded-full">
                                <div>
                                    <div class="text-sm font-semibold">Bill Sanders</div>
                                    <div class="text-sm text-base-content/80">Hello <strong>@Ragip Diller</strong>,
                                        could you sign the contract before March 12? 🙏</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-base-200 p-4 rounded shadow-sm">
                            <div class="flex items-center gap-2">
                                <img src="https://i.pravatar.cc/30?u=200" class="h-8 w-8 rounded-full">
                                <div>
                                    <div class="text-sm font-semibold">Jane Cooper</div>
                                    <div class="text-sm text-base-content/80">Uploaded new contract</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="py-20 px-6 lg:px-10 text-center max-w-4xl mx-auto">
        <!-- STATS -->
        <section class="py-8">
            <div class="flex justify-center gap-12 text-center max-w-4xl mx-auto">
                <div>
                    <div class="text-3xl font-bold counter" data-target="10" data-suffix="K+">0</div>
                    <p class="text-sm opacity-70">Active Users</p>
                </div>
                <div>
                    <div class="text-3xl font-bold counter" data-target="50" data-suffix="K+">0</div>
                    <p class="text-sm opacity-70">Tasks Completed</p>
                </div>
                <div>
                    <div class="text-3xl font-bold counter" data-target="99.9" data-suffix="%">0</div>
                    <p class="text-sm opacity-70">Uptime</p>
                </div>
            </div>
        </section>

        <div class="text-4xl text-primary my-4">“</div>

        <blockquote class="text-2xl md:text-3xl font-medium leading-relaxed text-base-content">
            Simple yet powerful, Larban transformed how our team manages projects and our productivity increased by 40%
            since using Larban.
        </blockquote>

        <!-- Avatar + Role -->
        <div class="mt-8 flex flex-col items-center justify-center space-y-2">
            <div class="flex items-center">
                <div class="relative">
                    <img src="{{ asset('storage/dummy.png') }}" alt="Person"
                        class="h-14 w-14 rounded-full border-4 border-base shadow" />
                    <img src="{{ asset('storage/unsoed.png') }}" alt="Unsoed"
                        class="h-14 w-14 rounded-full border-4 border-base shadow absolute -right-7 top-0 z-0" />
                </div>
            </div>
            <div class="flex items-center gap-2 text-lg font-semibold">
                Rifu Tempe
            </div>
            <div class="text-sm text-base-content/70">Head of Strategy at BTB</div>
        </div>
    </section>

    <!-- FINAL CTA + FOOTER -->
    <footer class="bg-base-300 dark:bg-base-100 text-base-content dark:text-base-content px-6 lg:px-10 py-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Branding + Contact -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 text-lg font-bold">
                    {{ config('app.name', 'Larban') }}
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-envelope"></i> hello@larban.com
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-phone"></i> +62 987 654 321
                </div>
            </div>

            <!-- Solution Links -->
            <div>
                <h4 class="font-semibold mb-3">Solution</h4>
                <ul class="space-y-1 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Why Larban</a></li>
                    <li><a href="#" class="hover:underline">Features</a></li>
                    <li><a href="#" class="hover:underline">Technology</a></li>
                </ul>
            </div>

            <!-- Customers -->
            <div>
                <h4 class="font-semibold mb-3">Customers</h4>
                <ul class="space-y-1 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Procurement</a></li>
                    <li><a href="#" class="hover:underline">Sales</a></li>
                    <li><a href="#" class="hover:underline">Legal</a></li>
                    <li><a href="#" class="hover:underline">Medium</a></li>
                    <li><a href="#" class="hover:underline">Enterprise</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="font-semibold mb-3">Resources</h4>
                <ul class="space-y-1 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Pricing</a></li>
                    <li><a href="#" class="hover:underline">Contact Sales</a></li>
                    <li><a href="#" class="hover:underline">Changelog</a></li>
                    <li><a href="#" class="hover:underline">Blog</a></li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-base-content dark:border-base-300 mt-12 pt-6">
            <div
                class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-base-content dark:text-base-content opacity-70">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Larban') }}. All rights reserved.</p>

                <div class="flex gap-4 text-lg">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.counter').forEach(counter => {
                const target = parseFloat(counter.dataset.target);
                const suffix = counter.dataset.suffix || '';
                const increment = target / 100;
                let current = 0;
                const update = () => {
                    current += increment;
                    if (current >= target) current = target;
                    counter.textContent = suffix === '%' ? current.toFixed(1) + '%' : Math.floor(
                        current) + suffix;
                    if (current < target) requestAnimationFrame(update);
                };
                update();
            });
        });
    </script>
</body>

</html>
