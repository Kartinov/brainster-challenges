<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Create discussion
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
    </div>

    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('discussions.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4">
                <div>
                    <x-label for='title' :value="__('Title')" />
                    <x-input id="title" name="title" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 border border-gray-200 rounded-md"
                        value="{{ old('title') }}" />
                </div>

                <div>
                    <x-label for='photo' :value="__('Photo')" />
                    <x-input id="photo" name="photo" type="file"
                        class=" px-4 py-2 mt-2 text-gray-700 border  border-gray-200" />
                </div>

                <div>
                    <x-label for='description' :value="__('Description')" />
                    <x-textarea id="description" name="description">{{ old('description') }}</x-textarea>
                </div>

                <div>
                    <x-label class="inline-block mr-3" for='category' :value="__('Category')" />
                    <x-select id="category" name="category_id">
                        @foreach ($categories as $category)
                            <option class="first-letter:capitalize" @selected(old('category_id') == $category->id)
                                value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

            </div>

            <div class="flex justify-start mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600">Create</button>
            </div>
        </form>
    </section>
</x-app-layout>
