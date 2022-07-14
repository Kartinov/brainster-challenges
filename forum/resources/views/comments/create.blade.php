<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight text-center">
            Create comment
        </h1>
    </x-slot>

    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form method="POST" action="{{ route('discussions.comments.store', $discussion) }}">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4">
                <div>
                    <x-label for='comment_text' :value="__('Comment')" />
                    <x-textarea id="comment_text" name="comment_text">{{ old('comment_text') }}</x-textarea>
                </div>
            </div>

            <div class="flex justify-start mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600">Submit</button>
            </div>
        </form>
    </section>
</x-app-layout>
