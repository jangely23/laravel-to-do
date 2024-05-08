<div class="items-center sm:w-auto">
    <form action="{{ route($routeName, $routeParams) }}" method="{{ $methodForm }}" class="sm:w-full ">
        @method($methodController)
        @csrf
        <button class="w-full rounded-md bg-red-500 md:px-3 md:py-2 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red">
            {{ $slot }}
        </button>
    </form>
</div>