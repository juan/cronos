@props([
'arrayopcion',
'arraylinks'
])
@php
    $arrayopcion = explode(",",$arrayopcion);
    $arraylinks  = explode(",",$arraylinks);
@endphp
<div class="py-1 px-3 bg-white ">
    <div class="-mx-1 ">
        <ul class="flex w-full flex-wrap items-center h-10 divide-x">
          @for($i=0;$i<count($arrayopcion);$i++)
              @php
                  $icon = sidebaricon($arrayopcion[$i]);
              @endphp
                <li class="block relative">
                    <a href="{{route("$arraylinks[$i]")}}" class="flex items-center h-10 leading-10 px-4 rounded cursor-pointer no-underline hover:no-underline transition-colors duration-100 mx-1 hover:bg-gray-100">
                        <span class="mr-3 text-xl"> <i class="mdi mdi-widgets-outline"></i> </span>
                        <span>{{$arrayopcion[$i]}}</span>
                        <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{$icon}}" />
                        </svg>

                    </a>
                </li>
          @endfor
        </ul>
    </div>
</div>
