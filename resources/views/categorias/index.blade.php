@extends('app')

@section('content')
 
    @if ($categorias)
        <div class="container grid md:grid-cols-2 grid-cols-1 gap-4">
    @else
        <div class="container min-w-full">
    @endif
    
        <div class="flex justify-center items-center min-h-full">
            <div class="sm:max-h-auto max-h-full rounded shadow-lg shadow-gray-300 xs:min-w-full min-w-96 flex-col justify-center items-center px-6 py-12 lg:px-8 md:mt-20">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Mis categorias</h2>
                </div>

                <div class="my-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{route('categorias.store')}}" method="POST">
                        @csrf

                        @if (session('success'))

                        <div id="alert-21" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Success</span>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                        </div>
                        @endif

                        @error('name')
                        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Danger</span>
                            <div class="ms-3 text-sm font-medium">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror

                        <div class="mb-2 pb-2">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre Categoria</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                            </div>
                        </div>

                        <div class="mb-2 pb-2">
                            <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Color</label>
                            <div class="mt-2">
                                <input id="color" name="color" type="color" autocomplete="color" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                            </div>
                        </div>

                        <div class="mb-2 ">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Crear categoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ($categorias)
            <div class="flex-col justify-center min-h-full min-w-full py-12 md:mt-4">
                
                @foreach ( $categorias as $categoria )
                
                    <div class="flex w-full  items-center justify-between px-5 py-4 m-2 shadow shadow-gray-200">
                       
                        <div class="items-center">
                            <span class="inline-flex items-center rounded-xl px-3 py-1.5 mx-3 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10" style="background-color: {{ $categoria->color }} "></span>

                            <a href="{{ route( 'categorias.show' , ['categoria' => $categoria->id ]) }}">{{ $categoria->name }}</a>
                        </div>

                        <div class="items-center">
                            <form action="{{ route('categorias.destroy', [$categoria->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="flex justify-center rounded-md bg-gray-800 px-1 py-1 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Eliminar</button>
                            </form>
                        </div>
                    </div>

                @endforeach

            </div> 
        @endif
    </div>

@endsection