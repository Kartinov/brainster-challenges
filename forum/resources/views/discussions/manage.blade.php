<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Manage Discussions
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a href="{{ route('dashboard') }}" class="inline-flex hover:text-blue-500 mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
            <span class="font-bold">Go Back</span>
        </a>

        <div class="p-6 overflow-hidden">

            {{-- flash message --}}
            <x-flash-message />

            <x-button-link class="mb-5" href="{{ route('discussions.create') }}">
                Add new discussion
            </x-button-link>

            <x-discussion-cards notFoundText="There is no discussions for approval" :discussions="$discussions" />
        </div>
    </div>
</x-app-layout>
