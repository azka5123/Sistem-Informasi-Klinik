<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Show Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4">

                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Nama Apoteker:</strong>
                                <span class="block mt-1 text-gray-900">{{ $transaction->apoteker->name }}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Nama Pasien:</strong>
                                <span class="block mt-1 text-gray-900">{{ $transaction->pasien->name }}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Obat:</strong>
                                <span class="block mt-1 text-gray-900">{{ $transaction->medicine->name }}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <strong>Tindakan:</strong>
                                <span class="block mt-1 text-gray-900">{{ $transaction->tindakan->name }}</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
