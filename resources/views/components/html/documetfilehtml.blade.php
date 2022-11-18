@props([
'data'
])

<div class="w-full h-auto mt-3 mb-2 flex rounded-l mr-1 ml-1 flex-col overflow-hidden bg-white shadow-md">
    <div class="text-wite flex justify-between">
        <div class="flex space-x-1 mt-2">
            <div class="mt-1">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"/>
                </svg>
            </div>
            <div>
                <div><h1 class="text-black font-sans text-[16px]">{{$data->namedocument}}</h1></div>
                 <p class="text-gray-800 leading-relaxed text-base text-[13px]"> {{$data->descripcion}}</p>
            </div>
        </div>
    </div>
    <div class="ml-3">cosas</div>

    <div class="flex flex-col  relative bottom-0">
        <div class="grid grid-cols-3 border-t divide-x divide-gray-300 text-green-900  bg-blue-100 dark:bg-transparent py-2">

            <a class=" cursor-pointer uppercase text-xs flex flex-row items-center justify-center font-semibold">
                <div class="mr-2">
                    <svg fill="#14532D" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                </div>
                Registrar
            </a>

            <a class="cursor-pointer uppercase text-xs flex flex-row items-center justify-center font-semibold">
                <div class="mr-2">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#14532D" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                    </svg>
                </div>
                Consultar
            </a>

            <a class="cursor-pointer uppercase text-xs flex flex-row items-center justify-center font-semibold">
                <div class="mr-2">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#14532D" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                    </svg>
                </div>
                Documentos ( 0 )
            </a>

        </div>
    </div>
</div>
