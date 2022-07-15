{{-- Comments --}}
@if (!count($discussion->comments))
    <h2 class="text-xl text-gray-500 mt-5">No comments found for this topic</h2>
@else
    <div>
        @foreach ($discussion->comments as $comment)
            <div class="p-10 border flex mb-5 shadow-lg justify-between">
                <div class="flex space-x-6">
                    <div>
                        <p class="font-semibold">{{ $comment->user->username }} says:</p>
                        <p>{{ $comment->comment_text }}</p>
                    </div>

                    @auth
                        @if (auth()->user()->isAdmin() || auth()->id() == $comment->user->id)
                            {{-- comment edit/delete --}}
                            <div class="flex items-start space-x-3">
                                <a href="{{ route('discussions.comments.edit', [$discussion, $comment]) }}"
                                    class="hover:text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <form action="{{ route('discussions.comments.destroy', [$discussion, $comment]) }}"
                                    method="POST" class="hover:text-red-500">
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
                        @endif
                    @endauth
                </div>

                <div class="flex space-x-2 text-gray-500">
                    {{ $comment->created_at }}
                </div>
            </div>
        @endforeach
    </div>
@endif
