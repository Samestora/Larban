<div
    class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

    <div class="flex flex-col items-center justify-center text-center">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white">
            {{ 'Welcome to ' . config('app.name') }}
        </h1>
        <h2 class="mt-4 text-xl text-gray-700 dark:text-gray-300">
            Visual task management made simple
        </h2>
    </div>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        This Kanban board lets you manage your work visually using cards, columns, and drag-and-drop functionality.
        Whether you're planning a product launch, managing client tasks, or organizing your daily to-dos, this tool
        keeps everything in one place — clear, organized, and actionable.
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="{{ route('boards.show') }}">View all boards</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            You can view all of the boards that you made here by their respective teams
        </p>

        <p class="mt-4 text-sm">
            <a href="https://laravel.com/docs"
                class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Explore the documentation

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    class="ms-1 size-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://laracasts.com">Laracasts</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out,
            see for yourself, and massively level up your development skills in the process.
        </p>

        <p class="mt-4 text-sm">
            <a href="https://laracasts.com"
                class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Start watching Laracasts

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    class="ms-1 size-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd"
                        d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://tailwindcss.com/">Tailwind</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your
            way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful
            framework at your fingertips.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                Authentication
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Authentication and registration views are included with Laravel Jetstream, as well as support for user email
            verification and resetting forgotten passwords. So, you're free to get started with what matters most:
            building your application.
        </p>
    </div>
</div>
