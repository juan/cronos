@props([
'heading',
])
@php
   $heading=explode(',',$heading);
@endphp

<table class="w-full shadow-xl rounded-lg">
    <thead>

    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">

      @foreach($heading as $key)
            @if ($loop->first)
               <th class="py-3  text-left ">{{$key}}</th>
            @endif
                @if ($loop->last)
                    <th class="py-3  text-center ">{{$key}}</th>
                @endif
                @if (!$loop->first and !$loop->last)
                    <th class="py-3 text-left ">{{$key}}</th>
                @endif
       @endforeach


    </tr>
    </thead>
      {{ $slot }}


</table>
