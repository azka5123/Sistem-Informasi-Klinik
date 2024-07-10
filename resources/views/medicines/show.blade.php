<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Show Medicine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4">

                        <div class="mb-3">
                            <div class="form-group">
                                <strong>kode:</strong>
                                <span class="block mt-1 text-gray-900">{{ $medicine->kode }}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <span class="block mt-1 text-gray-900">{{ $medicine->name }}</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
