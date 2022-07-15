  @if (count($discussions) == 0)
      <h2 class="text-center text-xl text-gray-500">{{ $notFoundText }}</h2>
  @else
      <div>
          @foreach ($discussions as $discussion)
              <div class="p-10 border flex space-x-3 mb-5 shadow-lg">
                  <a href="{{ route('discussions.show', $discussion) }}" class="flex mr-auto">
                      <img class="h-20 object-fit mr-6"
                          src="{{ $discussion->photo ? asset('storage/' . $discussion->photo) : asset('images/blank-image.jpg') }}"
                          alt="{{ $discussion->title }}">
                      <div>
                          <h3 class="text-xl font-semibold text-black mb-3">{{ $discussion->title }}</h3>
                          <p class="text-gray-600">{{ $discussion->description }}</p>
                      </div>
                  </a>

                  {{-- discussion approve/edit/delete --}}
                  <div class="flex items-start space-x-3 h-10 mr-auto">

                      {{-- show --}}
                      <a href="{{ route('discussions.show', $discussion) }}" class="hover:text-blue-500">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                      </a>

                      @if ($discussion->is_approved == 0)
                          {{-- approve --}}
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
                      @endif

                      {{-- edit --}}
                      <a href="{{ route('discussions.edit', $discussion) }}" class="hover:text-blue-500">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                          </svg>
                      </a>

                      {{-- delete --}}
                      <form action="{{ route('discussions.destroy', $discussion) }}" method="POST"
                          class="hover:text-red-500">
                          @csrf
                          @method('DELETE')
                          <button>
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor" stroke-width="2">
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
  @endif
