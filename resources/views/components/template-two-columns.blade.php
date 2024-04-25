@extends('app') {{-- Importa la plantilla base --}}

@section('content') {{-- abre una seccion --}}

    @if ($varContent)
        <div class="container grid md:grid-cols-2 grid-cols-1 w-full gap-4">
            
    @else
        <div class="container min-w-full">
    @endif 

        {{ $slot }}

    </div>
@endsection