<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Create Role') }}
            <a class="px-2 bg-green-400 rounded-lg" href="{{ route('roles.create') }}"> Create New Role</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (count($errors) > 0)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
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

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name"
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach ($permission as $value)
                                        <label class="inline-flex items-center mt-2">
                                            <input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                                class="form-checkbox h-5 w-5 text-indigo-600">
                                            <span class="ml-2">{{ $value->name }}</span>
                                        </label>
                                        <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="text-center">
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
