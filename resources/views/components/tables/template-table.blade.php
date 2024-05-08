@props(['class'])
<div class="flex justify-center w-full items-top h-auto ">
    <div class="grid grid-cols-1 content-start min-h-full w-full py-12
    @if (isset($class))
        {{$class}}
    @endif
    ">
        {{ $slot }}
    </div>
</div>