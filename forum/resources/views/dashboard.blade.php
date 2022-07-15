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

            @auth
                @if (auth()->user()->isAdmin())
                    <x-button-link class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-900 mb-5"
                        href="{{ route('discussions.manage') }}">
                        Approve discussions
                    </x-button-link>
                @endauth
            @endauth

            <x-discussion-cards notFoundText="Nothing here yet! Start a topic!" :discussions="$discussions" />

    </div>
</div>
</x-app-layout>
