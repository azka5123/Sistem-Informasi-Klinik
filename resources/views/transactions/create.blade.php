<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Create Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (count($errors) > 0)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Whoops!</strong>
                            <span class="block sm:inline">There were some problems with your input.</span>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div class="mb-3">
                                <div class="form-group">
                                    <strong>Apoteker:</strong>
                                    <input type="text" name="apoteker" value="{{ Auth::user()->name }}" readonly
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        >
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <strong>Pasien:</strong>
                                    <select
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                         name="pasien">
                                        @foreach ($data as $pasien)
                                            <option value="{{ $pasien->id }}">{{ $pasien->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <strong>Obat:</strong>
                                    <select
                                        class="form-control select2 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        name="obat">
                                        @foreach ($obats as $obat)
                                            <option value="{{ $obat->id }}">{{ $obat->kode }} / {{ $obat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group">
                                    <strong>Tindakan:</strong>
                                    <select
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                         name="tindakan">
                                        @foreach ($tindakans as $tindakan)
                                            <option value="{{ $tindakan->id }}">{{ $tindakan->name }} / {{ $tindakan->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit"
                                    class="btn btn-primary inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
