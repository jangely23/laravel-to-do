<div class="mb-2 pb-2 mx-2 w-full">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <select name="{{ $name }}" class="form-select px-4 ppy-1.5 rounded-md border-0 w-full text-sm shadow-sm ring-1 ring-inset ring-gray-300" id="{{ $name }}">
            <option> {{ __('Seleccionar') }} </option>
            {{ $slot }}
        </select>
    </div>
</div>