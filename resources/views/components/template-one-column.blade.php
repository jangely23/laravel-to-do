@extends('app') {{-- Importa la plantilla base --}}

@section('content') {{-- abre una seccion --}}

    <div class="w-full">

        {{ $slot }}

    </div>
@endsection