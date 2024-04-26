<div class="items-center">
    <form action="{{ route($routeName, $routeParams) }}" method="{{ $methodForm }}" class="sm:w-full ">
        @method($methodController)
        @csrf
        <button class=" sm:w-full rounded-md bg-gray-800 px-3 py-1.5 sm:py-1 text-sm font-semibold md:leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red">
            {{ $slot }}
        </button>
    </form>
</div>