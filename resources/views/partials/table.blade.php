@props(['data', 'columns', 'title', 'routePrefix'])

<div class="overflow-x-auto">
    <table class="w-full text-white">
        <thead class="bg-black">
            <tr>
                @foreach ($columns as $column)
                    <th class="px-4 py-3 text-center">{{ $column['label'] }}</th>
                @endforeach
                <th class="px-4 py-3 text-center">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
            @forelse ($data as $item)
                <tr class="hover:bg-black/20">
                    @foreach ($columns as $column)
                        <td class="px-4 py-3 text-center text-xs">
                            @if (isset($column['isImage']) && $column['isImage'])
                                <img src="{{ asset('/storage/movies/' . $item->{$column['field']}) }}"
                                    class="rounded-lg w-32">
                            @else
                                {{ $item->{$column['field']} }}
                            @endif
                        </td>
                    @endforeach
                    <td class="px-4 py-3 text-center text-xs">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route($routePrefix . '.destroy', $item->id) }}" method="POST">
                            <a href="{{ route($routePrefix . '.show', $item->id) }}"
                                class="inline-block px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700 mb-1">Show</a>
                            <a href="{{ route($routePrefix . '.edit', $item->id) }}"
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
                    <td colspan="{{ count($columns) + 1 }}" class="px-4 py-3 text-center text-xs">
                        <div class="bg-red-500/20 text-red-200 p-3 rounded-lg">
                            Data tidak tersedia.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $data->links() }}
</div>
