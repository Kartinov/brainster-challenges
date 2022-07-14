<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Welcome to the Forum
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden">

            {{-- flash message --}}
            <x-flash-message />


            <x-button-link class="mb-5" href="{{ route('discussions.create') }}">
                Add new discussion
            </x-button-link>

            {{-- All discussions --}}
            <x-card :items="$discussions" />
        </div>
    </div>
</x-app-layout>
