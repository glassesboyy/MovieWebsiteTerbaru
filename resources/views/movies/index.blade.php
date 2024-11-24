<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Movie - MovieZul</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        @include('partials.navbar')

        <main class="bg-gradient-to-b from-black to-purple-700 min-h-screen py-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-black/30 backdrop-blur-sm rounded-lg shadow-lg p-6">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-center text-white mb-4">Movie Data Showing</h3>
                        <hr class="border-gray-600">
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('movies.create') }}"
                            class="inline-block px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            Add Movie
                        </a>
                    </div>

                    @include('partials.table', [
                        'data' => $movies,
                        'columns' => [
                            ['label' => 'Poster', 'field' => 'poster', 'isImage' => true],
                            ['label' => 'Movie Title', 'field' => 'movie_title'],
                            ['label' => 'Description', 'field' => 'description'],
                            ['label' => 'Genre', 'field' => 'genre'],
                            ['label' => 'Release Date', 'field' => 'release_date'],
                            ['label' => 'Show Time', 'field' => 'show_time'],
                            ['label' => 'Ticket Price', 'field' => 'price'],
                            ['label' => 'Available Seats', 'field' => 'available_seats'],
                        ],
                        'title' => 'Movie Data',
                        'routePrefix' => 'movies',
                    ])
                </div>
            </div>
        </main>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000,
                background: '#1a1a1a',
                color: '#fff'
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000,
                background: '#1a1a1a',
                color: '#fff'
            });
        @endif
    </script>
</body>

</html>
