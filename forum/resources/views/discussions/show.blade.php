<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Welcome to the Forum
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-10">
            <div class="flex space-x-2 text-gray-500 justify-end">
                <span>{{ $discussion->category->name }}</span>
                <span>|</span>
                <span>{{ $discussion->user->username }}</span>
            </div>
            <div class="w-1/2 mx-auto">
                <img class="block mb-5"
                    src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : asset('images/blank-image.jpg') }}"
                    alt="{{ $discussion->title }}">
                <div>
                    <h3 class="text-xl font-semibold text-black mb-3">{{ $discussion->title }}</h3>
                    <p class="text-gray-600">{{ $discussion->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
