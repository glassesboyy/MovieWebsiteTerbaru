<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Customers - MovieZul</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        @include('partials.navbar')
        <!-- Data Pelanggan -->
        <main class="bg-gradient-to-b from-black to-purple-700 min-h-screen py-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-black/30 backdrop-blur-sm rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-bold text-center text-white mb-6">Data Customers</h3>

                    <!-- Tombol tambah pelanggan -->
                    <div class="mb-4">
                        <a href="{{ route('customers.create') }}"
                            class="inline-block px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            Add Customers
                        </a>
                    </div>

                    <!-- Tabel data pelanggan -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-white">
                            <thead class="bg-black">
                                <tr>
                                    <th class="px-4 py-3 text-center">Customer Name</th>
                                    <th class="px-4 py-3 text-center">Email</th>
                                    <th class="px-4 py-3 text-center">Movie Title</th>
                                    <th class="px-4 py-3 text-center">Show Time</th>
                                    <th class="px-4 py-3 text-center">Ticket Quantity</th>
                                    <th class="px-4 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @forelse ($customers as $customer)
                                    <tr class="hover:bg-black/20">
                                        <td class="px-4 py-3 text-center text-xs">{{ $customer->customer_name }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $customer->customer_email }}</td>
                                        <td class="px-4 py-3 text-center text-xs">
                                            {{ $customer->movieTicket->movie_title }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $customer->show_time }}</td>
                                        <td class="px-4 py-3 text-center text-xs">{{ $customer->ticket_quantity }}</td>
                                        <td class="px-4 py-3 text-center text-xs">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                                <a href="{{ route('customers.edit', $customer->id) }}"
                                                    class="inline-block px-3 py-1 bg-purple-600 text-white rounded hover:bg-purple-700 mb-1">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-3 text-center text-xs">
                                            <div class="bg-red-500/20 text-red-200 p-3 rounded-lg">
                                                Data pelanggan belum tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $customers->links() }}
                    </div>
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
        @endif
    </script>
</body>

</html>