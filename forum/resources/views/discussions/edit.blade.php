<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Edit discussion
        </h1>
    </x-slot>

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
