<div class="flex flex-wrap justify-center">
    @foreach ($movies as $movie)
        <div
            class="w-full max-w-sm mt-5 mb-5 mx-auto bg-black rounded-lg backdrop-blur-sm bg-black/30 shadow dark:bg-gray-800 dark:border-gray-700 hover:-translate-y-3 duration-300">
            <a href="#">
                <img class="aspect-square object-cover p-5 rounded-lg"
                    src="{{ asset('/storage/movies/' . $movie->poster) }}" alt="{{ $movie->movie_title }}" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-white dark:text-white">
                        {{ $movie->movie_title }}</h5>
                </a>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-white dark:text-white">Rp.
                        {{ number_format($movie->price, 0, ',', '.') }}</span>
                    @auth
                        <div class="flex items-center justify-between mt-5">
                            <a href="{{ route('customers.create') }}"
                                class="m-1 text-white backdrop-blur-md bg-black/30 hover:bg-black focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Booking</a>
                            <a href="{{ route('movies.show', $movie->id) }}"
                                class="m-1 text-white backdrop-blur-md bg-black/30 hover:bg-black focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Detail</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>
