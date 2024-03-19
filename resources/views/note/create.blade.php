<x-app-layout>
    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Notes Create') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <form class="max-w-xl mx-auto" method="POST" action="{{ route('notes.store') }}">
                        @csrf
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Notes</label>
                        <textarea id="note" rows="12" name="note"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Add Note Here">{{ old('note') }}</textarea>
                        @error('note')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <button type="submit"
                            class="mt-6 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
