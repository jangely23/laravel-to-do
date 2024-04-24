<div class="mb-2 pb-2">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <select name="{{ $name }}" class="px-4 py-3 border-none w-full text-sm" id="{{ $id }}">
            <option> {{ __('Seleccionar') }} </option>
            {{ $slot }}
        </select>
    </div>
</div>