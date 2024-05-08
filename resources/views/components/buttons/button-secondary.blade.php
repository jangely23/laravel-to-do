@props(['dataModalTarget', 'dataCloseButton', 'dataHideForm', 'class'])
<button     
    class="mt-2 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-200 md:w-auto sm:mt-0 mx-1

    @if(isset($class)) 
        {{ $class }} 
    @endif"

    @if(isset($dataModalTarget)) 
        data-modal-target="{{ $dataModalTarget }}" 
    @elseif(isset($dataCloseButton))
        data-close-button="{{ $dataCloseButton }}" 
    @elseif(isset($dataHideForm))
        data-hide-form="{{ $dataHideForm }}"
    @endif
>
    {{ $slot }}
</button>