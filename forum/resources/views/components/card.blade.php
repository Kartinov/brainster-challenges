@empty($items)
    <h2 class="text-center text-xl text-gray-500">Nothing here yet! Start a topic!</h2>
@else
    <div>
        @foreach ($items as $item)
            <a href="{{ route('discussions.show', $item) }}"
                class="p-10 border flex mb-5 shadow-lg justify-between cursor-pointer hover:border-blue-600">
                <div class="flex">
                    <img class="h-20 object-fit mr-6"
                        src="{{ $item->photo ? asset('storage/' . $item->photo) : asset('images/blank-image.jpg') }}"
                        alt="{{$discussion->title}}">
                    <div>
                        <h3 class="text-xl font-semibold text-black mb-3">{{ $item->title }}</h3>
                        <p class="text-gray-600">{{ $item->description }}</p>
                    </div>
                </div>
                <div class="flex space-x-2 text-gray-500">
                    <span>{{ $item->category->name }}</span>
                    <span>|</span>
                    <span>{{ $item->user->username }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endempty
