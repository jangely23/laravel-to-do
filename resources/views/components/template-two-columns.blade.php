@extends('app') {{-- Importa la plantilla base --}}

@section('content') {{-- abre una seccion --}}

    @if ($varContent)
        <div 
            class="grid md:grid-cols-2 grid-cols-1 min-w-full gap-4" 
            @if (isset($colorhex))
                style="background-image: linear-gradient(to bottom right, {{ $colorhex }} 50%, {{ $colorhex.'99' }} 100% );"
            @endif
        >
            
    @else
        <div 
            class="container min-w-full"
            @if (isset($colorhex))
                style="background-image: linear-gradient(to bottom right, {{ $colorhex }} 50%, {{ $colorhex.'99' }} 100% );"
            @endif    
        >
    @endif 

        {{ $slot }}

    </div>
@endsection