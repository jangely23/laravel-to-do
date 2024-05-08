@props(['colorhex'])

<div class=" rounded overflow-hidden shadow-lg m-3 w-full" style="background-image: linear-gradient(to bottom right, {{ $colorhex }} 50%, {{ $colorhex.'99' }} 100% );" >
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ $slot }}</div>
  </div>
</div>