<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Customer - MovieZul</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    @include('partials.navbar')
    <div class="min-h-full">
        <main class="bg-gradient-to-b from-black to-purple-700 min-h-screen py-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto">
                    <div class="bg-black/30 backdrop-blur-sm rounded-lg shadow-lg p-6">
                        <h3 class="text-2xl font-bold text-center text-white mb-6">Book Movie</h3>

                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">Name</label>
                                <input type="text"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('customer_name') border-red-500 @enderror"
                                    name="customer_name" value="{{ old('customer_name') }}"
                                    placeholder="Masukkan Nama Pelanggan">
                                @error('customer_name')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('customer_email') border-red-500 @enderror"
                                    name="customer_email" value="{{ old('customer_email') }}"
                                    placeholder="Masukkan Email Pelanggan">
                                @error('customer_email')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">Movie</label>
                                <select name="movie_id"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('movie_id') border-red-500 @enderror">
                                    <option value="" disabled selected>Pick a Movie</option>
                                    @foreach ($movies as $movie)
                                        <option class="text-white" value="{{ $movie->id }}">{{ $movie->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('movie_id')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">Show Time</label>
                                <select name="show_time"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('show_time') border-red-500 @enderror">
                                    <option value="" disabled selected>Pick a Show Time</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="16:00">04:00 PM</option>
                                    <option value="19:00">07:00 PM</option>
                                    <option value="22:00">10:00 PM</option>
                                </select>
                                @error('show_time')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-white font-medium mb-2">Ticket Quantity</label>
                                <input type="number"
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-purple-500 @error('ticket_quantity') border-red-500 @enderror"
                                    name="ticket_quantity" value="{{ old('ticket_quantity') }}"
                                    placeholder="Masukkan Jumlah Tiket">
                                @error('ticket_quantity')
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
