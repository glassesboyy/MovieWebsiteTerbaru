<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieZul</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        @include('partials.navbar')
        <main class="bg-gradient-to-b from-black to-purple-700">
            @guest
                <div id="ask-banner"
                    class="fixed z-50 flex flex-col md:flex-row justify-between w-[calc(100%-2rem)] p-3 -translate-x-1/2 backdrop-blur-sm bg-white/30 rounded-lg lg:max-w-3xl left-1/2 top-4 shadow-lg">
                    <div class="flex flex-col items-start mb-3 me-4 md:items-center md:flex-row md:mb-0">
                        <p class="flex items-center text-sm font-normal text-white">You are not logged in! Please log in or
                            register if you do not have an account first to order movie tickets!</p>
                    </div>
                    <div class="flex items-center flex-shrink-0">
                        <button data-dismiss-target="#ask-banner" type="button"
                            class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-black hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close banner</span>
                        </button>
                    </div>
                </div>
            @endguest

            <!-- Carousel Section -->
            @include('partials.carousel')

            <!-- Movie Card Section -->
            @include('partials.card')

            @include('partials.footer')
    </div>
    </main>
    </div>
</body>

</html>
