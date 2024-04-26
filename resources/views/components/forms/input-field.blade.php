<div class="mb-2 pb-2 mx-2 w-full">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $slot }}
    </label>
    
    <div class="mt-2">
        <input 
            id="{{ $name }}" 
            name="{{ $name }}" 
            type="{{ $type }}" 
            autocomplete="{{ $name }}" 
            class="form-input block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3"
            @isset($value) value="{{ $value }}" @endisset
        >
    </div>
</div>