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

            <x-button-link class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-900 mb-5"
                href="{{ route('discussions.manage') }}">
                Approve discussions
            </x-button-link>

            @empty($discussions)
                <h2 class="text-center text-xl text-gray-500">Nothing here yet! Start a topic!</h2>
            @else
                <div>
                    @foreach ($discussions as $discussion)
                        <a href="{{ route('discussions.show', $discussion) }}"
                            class="p-10 border flex space-x-3 mb-5 shadow-lg justify-between cursor-pointer hover:border-blue-600">
                            <div class="flex">
                                <img class="h-20 object-fit mr-6"
                                    src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : asset('images/blank-image.jpg') }}"
                                    alt="{{ $discussion->title }}">
                                <div>
                                    <h3 class="text-xl font-semibold text-black mb-3">{{ $discussion->title }}</h3>
                                    <p class="text-gray-600">{{ $discussion->description }}</p>
                                </div>
                            </div>

                            <div class="flex space-x-2 text-gray-500">
                                <span>{{ $discussion->category->name }}</span>
                                <span>|</span>
                                <span>{{ $discussion->user->username }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endempty

        </div>
    </div>
</x-app-layout>
