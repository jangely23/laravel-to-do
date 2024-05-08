@props(['dataModalTarget', 'dataCloseButton', 'dataHideForm'])
<button 
    class='flex justify-center rounded-full px-2 py-1 text-xs font-semibold text-white shadow-lg hover:bg-gray-00 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600'
    
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
