<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Manage Discussions
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden">

            {{-- flash message --}}
            <x-flash-message />

            <x-button-link class="mb-5" href="{{ route('discussions.create') }}">
                Add new discussion
            </x-button-link>

            @empty($discussions)
                <h2 class="text-center text-xl text-gray-500">Nothing here yet! Start a topic!</h2>
            @else
                <div>
                    @foreach ($discussions as $discussion)
                        <div class="p-10 border flex space-x-3 mb-5 shadow-lg justify-between">
                            <div class="flex">
                                <img class="h-20 object-fit mr-6"
                                    src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : asset('images/blank-image.jpg') }}"
                                    alt="{{ $discussion->title }}">
                                <div>
                                    <h3 class="text-xl font-semibold text-black mb-3">{{ $discussion->title }}</h3>
                                    <p class="text-gray-600">{{ $discussion->description }}</p>
                                </div>
                            </div>

                            {{-- discussion approve/edit/delete --}}
                            <div class="flex items-center space-x-3 h-10">
                                <form action="{{ route('discussions.approve', $discussion) }}" method="POST"
                                    class="hover:text-red-500">
                                    @csrf
                                    @method('PUT')
                                    <button class="hover:text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>

                                <a href="{{ route('discussions.edit', $discussion) }}" class="hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <form action="{{ route('discussions.destroy', $discussion) }}" method="POST"
                                    class="hover:text-red-500">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="flex space-x-2 text-gray-500">
                                <span>{{ $discussion->category->name }}</span>
                                <span>|</span>
                                <span>{{ $discussion->user->username }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endempty
        </div>
    </div>
</x-app-layout>
