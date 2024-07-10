<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Tindakan') }}
            <a class="px-2 bg-green-400 rounded-lg" href="{{ route('tindakans.create') }}"> Create New Tindakan</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($message = Session::get('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data as $key => $tindakan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $tindakan->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $tindakan->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('tindakans.destroy', $tindakan->id) }}" method="POST">
                                            <a class="text-indigo-600 hover:text-indigo-900"
                                                href="{{ route('tindakans.show', $tindakan->id) }}">Show</a>
                                            <a class="text-blue-600 hover:text-blue-900 ml-4"
                                                href="{{ route('tindakans.edit', $tindakan->id) }}">Edit</a>


                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-blue-600 hover:text-blue-900 ml-4">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $data->links('pagination::tailwind') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
