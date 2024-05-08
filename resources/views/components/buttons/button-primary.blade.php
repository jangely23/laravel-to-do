@props(['dataShowForm','class'])

<div 
    class="mb-2 

    @if(isset($class)) 
        {{ $class }} 
    @endif"
>                          
    <button 
    class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 " 
    
    @if(isset($dataShowForm)) 
        data-show-form ="{{ $dataShowForm }}" 
    @endif
    >   
        {{ $slot }}
    </button>
</div>