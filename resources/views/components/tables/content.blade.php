@props(['colorhex'])
<div class="
   rounded 
   grid 
   md:grid-cols-auto 
   md:grid-flow-col 
   md:gap-2 
   md:justify-between 
   md:items-center 
   md:px-3 
   justify-items-start 
   w-full 
   py-2 
   mx-2 
   shadow 
   shadow-gray-200"

   style="background-image: linear-gradient(to bottom right, {{ $colorhex }} 50%, {{ $colorhex.'99' }} 100% );" 
>

   {{ $slot }}
        
</div>
                