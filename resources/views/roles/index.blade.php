<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Role') }}
            <a class="px-2 bg-green-400 rounded-lg" href="{{ route('roles.create') }}"> Create New Role</a>
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
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            <a class="text-indigo-600 hover:text-indigo-900"
                                                href="{{ route('roles.show', $role->id) }}">Show</a>
                                            @can('role-edit')
                                                <a class="text-indigo-600 hover:text-indigo-900 ml-2"
                                                    href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('role-delete')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $roles->links('pagination::tailwind') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

