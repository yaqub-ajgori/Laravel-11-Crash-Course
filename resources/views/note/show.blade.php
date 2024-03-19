<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Single Note') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <p class="text-white text-center">
                    {{ $note->note ?? '' }}
                </p>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
