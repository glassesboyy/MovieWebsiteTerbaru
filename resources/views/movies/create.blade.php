<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Movie - MovieZul</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        <main class="bg-gradient-to-b from-black to-purple-700 min-h-screen py-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto">
                    <div class="bg-black/30 backdrop-blur-sm rounded-lg shadow-lg p-6">
                        <h3 class="text-2xl font-bold text-center text-white mb-6">Add New Movie</h3>

                        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">POSTER</label>
                                <input type="file"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('poster') border-red-500 @enderror"
                                    name="poster">
                                @error('poster')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">MOVIE TITLE</label>
                                <input type="text"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('movie_title') border-red-500 @enderror"
                                    name="movie_title" value="{{ old('movie_title') }}"
                                    placeholder="Masukkan Judul Film">
                                @error('movie_title')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">DESCRIPTION</label>
                                <textarea
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('description') border-red-500 @enderror"
                                    name="description" rows="5" placeholder="Masukkan Deskripsi Film">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-white font-medium mb-2">GENRE</label>
                                    <input type="text"
                                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('genre') border-red-500 @enderror"
                                        name="genre" value="{{ old('genre') }}" placeholder="Masukkan Genre Film">
                                    @error('genre')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-white font-medium mb-2">RELEASE DATE</label>
                                    <input type="date"
                                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('release_date') border-red-500 @enderror"
                                        name="release_date" value="{{ old('release_date') }}">
                                    @error('release_date')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="block text-white font-medium mb-2">SHOW TIME</label>
                                    <input type="time"
                                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('show_time') border-red-500 @enderror"
                                        name="show_time" value="{{ old('show_time') }}">
                                    @error('show_time')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-white font-medium mb-2">PRICE</label>
                                    <input type="number"
                                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('price') border-red-500 @enderror"
                                        name="price" value="{{ old('price') }}" placeholder="Masukkan Harga Tiket">
                                    @error('price')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-white font-medium mb-2">AVAILABLE SEATS</label>
                                <input type="number"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('available_seats') border-red-500 @enderror"
                                    name="available_seats" value="{{ old('available_seats') }}"
                                    placeholder="Masukkan Jumlah Kursi Tersedia">
                                @error('available_seats')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="reset"
                                    class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors duration-200">RESET</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
