<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Show Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-semibold">Show Role</h2>
                            <a class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded" href="{{ route('roles.index') }}">Back</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <span class="block mt-1">{{ $role->name }}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Permissions:</strong>
                                <div class="mt-1">
                                    @if (!empty($rolePermissions))
                                        @foreach ($rolePermissions as $role)
                                            <span class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $role->name }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
