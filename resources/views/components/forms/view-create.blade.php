<div class="flex justify-center items-top h-auto">
    <div class="sm:max-h-auto max-h-full rounded shadow-lg shadow-gray-300 xs:min-w-full w-4/5 flex-col justify-center items-center px-6 py-8 lg:px-8 md:mt-10">
       <div class="sm:mx-auto w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ __($name) }}</h2>
        </div>

        <div class="my-10 w-full">
            <form class="px-6 py-8" action="{{ route($action) }}" method="POST" > 
                @csrf
                {{ $slot }}
            </form>
        </div>
    </div>
</div>
