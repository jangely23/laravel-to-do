<div class="mb-2 pb-2">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $slot }}
    </label>
    <textarea
        id="{{ $name }}" 
        name="{{ $name }}" 
        class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        rows="3"
        @isset($value) value="{{ $value }}" @endisset
    >

    </textarea>     
</div>