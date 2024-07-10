<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Show User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <span class="block mt-1 text-gray-900">{{ $user->name }}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <span class="block mt-1 text-gray-900">{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Roles:</strong>
                                <div class="mt-1">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-2">{{ $v }}</span>
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
