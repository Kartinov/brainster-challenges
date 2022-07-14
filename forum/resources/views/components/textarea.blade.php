@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'block w-full h-24 px-4 py-2 text-gray-700 bg-white border rounded-md',
]) !!}>{{ $slot }}</textarea>
