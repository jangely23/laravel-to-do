@extends('app') {{-- Importa la plantilla base --}}

@section('content') {{-- abre una seccion --}}
    <div class="container max-w-full ">
        <div class="flex justify-center min-h-full ">
            <div class="sm:max-h-auto  max-h-full rounded shadow-lg shadow-gray-300 xs:min-w-full min-w-96 flex-col justify-center items-center px-6 py-12 lg:px-8 md:mt-20">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Mis tareas</h2>
                </div>

                <div class="my-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('update-todos', ['id' => $tarea->id ]) }}" method="POST" >
                        @method('PATCH')
                        @csrf

                        <div class="mb-2 pb-2">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título tarea</label>
                            <div class="mt-2">
                                <input id="text" name="title" type="title" autocomplete="title" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3" value="{{ $tarea->title }}">
                            </div>
                        </div>

                        <div class="mb-2 ">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Actualizar tarea</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
