<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tiket Film</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Menggunakan nav yang sama seperti template sebelumnya -->
        <nav class="bg-black py-3">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="/home"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
                                <a href="/movies"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Movie</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="bg-gradient-to-b from-black to-purple-700 min-h-screen py-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-black/30 backdrop-blur-sm rounded-lg shadow-lg p-6">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-center text-white mb-4">Data Film Tayang</h3>
                        <hr class="border-gray-600">
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('movies.create') }}"
                            class="inline-block px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            Tambah Film
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-white">
                            <thead class="bg-black">
                                <tr>
                                    <th class="px-4 py-3 text-center">Poster</th>
                                    <th class="px-4 py-3 text-center">Judul Film</th>
                                    <th class="px-4 py-3 text-center">Deskripsi</th>
                                    <th class="px-4 py-3 text-center">Genre</th>
                                    <th class="px-4 py-3 text-center">Tanggal Rilis</th>
                                    <th class="px-4 py-3 text-center">Waktu Tayang</th>
                                    <th class="px-4 py-3 text-center">Harga</th>
                                    <th class="px-4 py-3 text-center">Kursi Tersisa</th>
                                    <th class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @forelse ($movies as $ticket)
                                    <tr class="hover:bg-black/20">
                                        <td class="px-4 py-3">
                                            <img src="{{ asset('/storage/movies/' . $ticket->poster) }}"
                                                class="rounded-lg w-32">
                                        </td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $ticket->movie_title }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $ticket->description }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $ticket->genre }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $ticket->release_date }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $ticket->show_time }}</td>
                                        <td class="px-4 py-3 text-center text-xs">
                                            {{ 'Rp ' . number_format($ticket->price, 2, ',', '.') }}
                                        </td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $ticket->available_seats }}</td>
                                        <td class="px-4 py-3 text-center text-xs">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('movies.destroy', $ticket->id) }}" method="POST">
                                                <a href="{{ route('movies.show', $ticket->id) }}"
                                                    class="inline-block px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700 mb-1">LIHAT</a>
                                                <a href="{{ route('movies.edit', $ticket->id) }}"
                                                    class="inline-block px-3 py-1 bg-purple-600 text-white rounded hover:bg-purple-700 mb-1">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-4 py-3 text-center text-xs">
                                            <div class="bg-red-500/20 text-red-200 p-3 rounded-lg">
                                                Data Film tayang belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Pesan dengan sweetalert
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
