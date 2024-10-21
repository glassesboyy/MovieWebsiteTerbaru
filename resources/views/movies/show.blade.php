<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Movie - MovieZul</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    @include('partials.navbar')
    <div class="min-h-full">
        <main class="bg-gradient-to-b from-black to-purple-700 min-h-screen py-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-black/30 backdrop-blur-sm rounded-lg shadow-lg p-6">
                        <h3 class="text-2xl font-bold text-center text-white mb-6">Detail Movie</h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-1">
                                <img src="{{ asset('/storage/movies/' . $movie->poster) }}"
                                    class="w-full rounded-lg shadow-lg" alt="{{ $movie->movie_title }}">
                            </div>

                            <!-- Details Column -->
                            <div class="md:col-span-2 text-white">
                                <div class="space-y-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-purple-400">Movie Title</h4>
                                        <p class="mt-1">{{ $movie->movie_title }}</p>
                                    </div>

                                    <div>
                                        <h4 class="text-lg font-semibold text-purple-400">Description</h4>
                                        <p class="mt-1">{{ $movie->description }}</p>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <h4 class="text-lg font-semibold text-purple-400">Genre</h4>
                                            <p class="mt-1">{{ $movie->genre }}</p>
                                        </div>

                                        <div>
                                            <h4 class="text-lg font-semibold text-purple-400">Release Date</h4>
                                            <p class="mt-1">{{ $movie->release_date }}</p>
                                        </div>

                                        <div>
                                            <h4 class="text-lg font-semibold text-purple-400">Show Time</h4>
                                            <p class="mt-1">{{ $movie->show_time }}</p>
                                        </div>

                                        <div>
                                            <h4 class="text-lg font-semibold text-purple-400">Ticket Price</h4>
                                            <p class="mt-1">{{ 'Rp ' . number_format($movie->price, 2, ',', '.') }}
                                            </p>
                                        </div>

                                        <div>
                                            <h4 class="text-lg font-semibold text-purple-400">Available Seats</h4>
                                            <p class="mt-1">{{ $movie->available_seats }} seats</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 flex space-x-3">
                                    <a href="{{ route('movies.index') }}"
                                        class="inline-block px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200">
                                        Back
                                    </a>
                                    <a href="{{ route('movies.edit', $movie->id) }}"
                                        class="inline-block px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
