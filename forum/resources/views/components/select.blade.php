    <select
        {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg']) }}>
        <option selected value="">Choose</option>
        {{ $slot }}
    </select>
