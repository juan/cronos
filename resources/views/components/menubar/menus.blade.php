<div>

    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto py-2 px-5 bg-slate-700 dark:bg-gray-800">
            <!---Start loop menu-->
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-white rounded-lg dark:text-white
                                 hover:bg-blue-400 dark:hover:bg-gray-700">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                        <span class="ml-3">Inicio</span>
                    </a>
                </li>
            </ul>
            @php

          $opciones = App\Models\Menu::withWhereHas('menuopcions.menuopcionusers', fn($query)=>
                            $query->where('user_id',auth()->user()->id))
                            ->orderBy('numcolum')
                           ->get();

            @endphp
                    <!---Start loop menu-->
            @foreach($opciones as $data)
                @if($data->menuopcions->count()>=1)

                    <button type="button" class="flex items-center p-2 w-full text-base
                            font-normal text-gray-900 rounded-lg transition duration-75 group
                            hover:bg-blue-400 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="{{$data->namemenu.$data->id}}"
                            data-collapse-toggle="{{$data->namemenu.$data->id}}">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="{{$data->bigicon}}"/>
                        </svg>
                        <span class="flex-1 ml-3 text-left text-white whitespace-nowrap"
                              sidebar-toggle-item="">{{$data->namemenu}}</span>
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                        </svg>

                    </button>
                    <ul id="{{$data->namemenu.$data->id}}" class="hidden py-2 space-y-2">
                        @foreach($data->menuopcions as $key)
                            <li>
                                <a href="{{$key->linkto}}"
                                   class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-blue-400 dark:text-white dark:hover:bg-gray-700">{{$key->namemenu}}</a>
                            </li>
                        @endforeach
                    </ul>

                @else
                    <a href="#"
                       class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                            <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">{{$data->namemenu}}</span>
                        <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                    </a>

                @endif
            @endforeach
            <!---End loop menu-->
            <ul class="space-y-2">
                <li>
                    <a href="#"
                       class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true"
                             class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
