@extends('app') {{-- Importa la plantilla base --}}

@section('content') {{-- abre una seccion --}}

    <div class="container min-w-full">

        {{ $slot }}

    </div>
@endsection