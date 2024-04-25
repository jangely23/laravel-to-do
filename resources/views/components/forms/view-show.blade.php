@extends('app') {{-- Importa la plantilla base --}}

@section('content') {{-- abre una seccion --}}

    <div class="container max-w-full ">
        <div class="flex justify-center min-h-full ">
            <div class="sm:max-h-auto  max-h-full rounded shadow-lg shadow-gray-300 xs:min-w-full min-w-96 flex-col justify-center items-center px-6 py-12 lg:px-8 md:mt-20">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ __($title) }}</h2>
                </div>

                <div class="my-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form  action="{{ route($routeName, $routeParams) }}" method="{{ $methodForm }}" class="space-y-6">
                        @method($methodController)
                        @csrf

                        {{ $slot }}              
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection