<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'KanbanFlow') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] flex flex-col items-center min-h-screen font-sans">

    <header
        class="w-full max-w-7xl flex items-center justify-between py-6 px-6 lg:px-10 mb-12 border-b border-gray-200 dark:border-gray-800 shadow-sm">
        <h1 class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">
            {{ config('app.name', 'KanbanFlow') }}
        </h1>

        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-2 border border-gray-300 dark:border-gray-700 text-sm rounded-md hover:border-gray-400 dark:hover:border-gray-600 transition-colors duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 border border-transparent text-sm hover:border-gray-400 dark:hover:border-gray-600 transition-colors duration-200">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-2 border border-gray-300 dark:border-gray-700 text-sm rounded-md hover:border-gray-400 dark:hover:border-gray-600 transition-colors duration-200">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main
        class="text-center max-w-2xl space-y-6 mb-16 px-6 lg:px-10 py-16 bg-gradient-to-br from-indigo-50 to-white dark:from-gray-900 dark:to-gray-800 rounded-xl shadow-lg">
        <h2 class="text-5xl font-extrabold leading-tight text-gray-900 dark:text-white">
            Visualize Your Workflow with Ease
        </h2>
        <p class="text-gray-700 dark:text-gray-300 text-xl max-w-xl mx-auto">
            Welcome to {{ config('app.name') }}, a powerful yet simple digital Kanban tool to manage your tasks,
            projects, and teams — all in one visual space.
        </p>
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="inline-block px-10 py-5 bg-indigo-600 text-white font-bold text-lg rounded-xl shadow-2xl hover:bg-indigo-700 transition transform hover:scale-105 hover:shadow-indigo-500/50 focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50">
                Get Started for Free
            </a>
        @endif
    </main>

    <section class="w-full max-w-5xl px-6 lg:px-10 mb-16">
        <h3 class="text-4xl font-bold text-center mb-12 text-gray-800 dark:text-gray-200">Features at a Glance</h3>
        <div
            class="relative w-full overflow-hidden rounded-2xl shadow-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <div id="carousel-container" class="flex transition-transform duration-500 ease-in-out">
                <div class="w-full flex-shrink-0 p-10 flex flex-col md:flex-row items-center justify-center gap-10">
                    <img src="https://placehold.co/450x300/E0E7FF/3F51B5?text=Intuitive+Boards" alt="Intuitive Boards"
                        class="w-full md:w-1/2 h-auto rounded-xl shadow-lg object-cover border border-indigo-200 dark:border-indigo-700">
                    <div class="text-center md:text-left md:w-1/2 space-y-5">
                        <h4 class="text-3xl font-bold text-indigo-700 dark:text-indigo-400">Intuitive Kanban Boards
                        </h4>
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">Organize tasks into
                            customizable columns like "To
                            Do," "In Progress," and "Done." Drag and drop tasks effortlessly to visualize your progress.
                        </p>
                    </div>
                </div>
                <div class="w-full flex-shrink-0 p-10 flex flex-col md:flex-row items-center justify-center gap-10">
                    <img src="https://placehold.co/450x300/E0E7FF/3F51B5?text=Team+Collaboration"
                        alt="Team Collaboration"
                        class="w-full md:w-1/2 h-auto rounded-xl shadow-lg object-cover border border-indigo-200 dark:border-indigo-700">
                    <div class="text-center md:text-left md:w-1/2 space-y-5">
                        <h4 class="text-3xl font-bold text-indigo-700 dark:text-indigo-400">Seamless Team
                            Collaboration</h4>
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">Share boards with your team,
                            assign tasks, add
                            comments, and track progress together in real-time to keep everyone on the same page.</p>
                    </div>
                </div>
                <div class="w-full flex-shrink-0 p-10 flex flex-col md:flex-row items-center justify-center gap-10">
                    <img src="https://placehold.co/450x300/E0E7FF/3F51B5?text=Customizable+Workflows"
                        alt="Customizable Workflows"
                        class="w-full md:w-1/2 h-auto rounded-xl shadow-lg object-cover border border-indigo-200 dark:border-indigo-700">
                    <div class="text-center md:text-left md:w-1/2 space-y-5">
                        <h4 class="text-3xl font-bold text-indigo-700 dark:text-indigo-400">Customizable Workflows
                        </h4>
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">Adapt KanbanFlow to your
                            specific needs with custom
                            fields, labels, and board settings, ensuring it fits your unique project requirements.</p>
                    </div>
                </div>
            </div>

            <button id="prev-btn"
                class="absolute top-1/2 left-6 -translate-y-1/2 bg-gray-900 bg-opacity-60 text-white p-4 rounded-full hover:bg-opacity-80 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75 text-xl shadow-md">
                &#10094;
            </button>
            <button id="next-btn"
                class="absolute top-1/2 right-6 -translate-y-1/2 bg-gray-900 bg-opacity-60 text-white p-4 rounded-full hover:bg-opacity-80 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-75 text-xl shadow-md">
                &#10095;
            </button>

            <div id="carousel-dots" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3">
                <button class="w-4 h-4 bg-gray-400 rounded-full transition-colors duration-200"></button>
                <button class="w-4 h-4 bg-gray-400 rounded-full transition-colors duration-200"></button>
                <button class="w-4 h-4 bg-gray-400 rounded-full transition-colors duration-200"></button>
            </div>
        </div>
    </section>

    <footer class="w-full max-w-7xl text-center py-8 px-6 lg:px-10 text-gray-500 dark:text-gray-600 text-sm mt-auto">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'KanbanFlow') }}. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carouselContainer = document.getElementById('carousel-container');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const dotsContainer = document.getElementById('carousel-dots');
            const slides = Array.from(carouselContainer.children);
            const totalSlides = slides.length;
            let currentIndex = 0;
            let autoSlideInterval;

            // Function to update carousel display
            const updateCarousel = () => {
                carouselContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
                updateDots();
            };

            // Function to update dot indicators
            const updateDots = () => {
                Array.from(dotsContainer.children).forEach((dot, index) => {
                    dot.classList.remove('bg-indigo-600', 'dark:bg-indigo-400');
                    dot.classList.add('bg-gray-400');
                    if (index === currentIndex) {
                        dot.classList.add('bg-indigo-600', 'dark:bg-indigo-400');
                        dot.classList.remove('bg-gray-400');
                    }
                });
            };

            // Go to next slide
            const goToNextSlide = () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            };

            // Go to previous slide
            const goToPrevSlide = () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
            };

            // Event listeners for navigation buttons
            nextBtn.addEventListener('click', () => {
                goToNextSlide();
                resetAutoSlide();
            });

            prevBtn.addEventListener('click', () => {
                goToPrevSlide();
                resetAutoSlide();
            });

            // Event listeners for dot indicators
            dotsContainer.addEventListener('click', (event) => {
                if (event.target.tagName === 'BUTTON') {
                    const dotIndex = Array.from(dotsContainer.children).indexOf(event.target);
                    if (dotIndex !== -1) {
                        currentIndex = dotIndex;
                        updateCarousel();
                        resetAutoSlide();
                    }
                }
            });

            // Auto-slide functionality
            const startAutoSlide = () => {
                autoSlideInterval = setInterval(goToNextSlide, 5000); // Change slide every 5 seconds
            };

            const resetAutoSlide = () => {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            };

            // Initialize carousel
            updateCarousel();
            startAutoSlide();
        });
    </script>
</body>

</html>
