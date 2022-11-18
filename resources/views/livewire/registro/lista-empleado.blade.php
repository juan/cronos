<div>
        <x-html.sidebarmenu arrayopcion="Registro,Consulta" arraylinks="rempleado,listuser"/>
        <x-menubar.headermenu nameform="Registro / Empleado / Consulta"/>
        <div class="p-4 shadow-lg rounded-lg bg-indigo-200 text-gray-700 mt-2">
                <div class="flex items-center justify-between">
                        <div class="pl-3 text-xl md:text-1xl text-slate-800 font-bold mb-1 px-1">
                                Listado empleados.
                        </div>
                </div><!--End Two Sides -->
                @if(count($listusers)>=1)
                        <div class="relative">

                                <div class="absolute inset-y-0 left-0 flex items-center">
                                        <select wire:model="opcionsearch"
                                                class="h-full rounded-md border-transparent bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="dni">DNI</option>
                                                <option value="name">Nombre</option>
                                                <option value="lastname">Apellido</option>
                                                <option value="cuil">CUIL</option>
                                        </select>
                                </div>
                                <input wire:model="search"
                                        type="text" name="search" id="search"
                                       autocomplete="off"
                                       class="block w-full rounded-md border-gray-300 pl-24 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Buscar empleado...">
                        </div>
                @endif
                <div class="flex items-center mt-4 ml-2">

                        @if(count($listusers)==0)
                                <div class="p-4 mb-4 flex w-full justify-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                        <span class="font-medium">No existen empleados registrados.</span>
                                </div>
                        @else
                                <x-html.tablehtml heading="No.,Nombre,Apellido,DNI,CUIL,Teléfono,Correo,Estatus,Opciones" >
                                       <x-slot name="slot">
                                        @foreach($listusers as $datauser)
                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="py-2 text-sm text-left ">
                                                                {{$loop->iteration}}
                                                        </td>
                                                        <td class="py-2 text-sm text-left">
                                                                {{$datauser->name}}
                                                        </td>
                                                        <td class="py-2 text-sm text-left">
                                                                {{$datauser->lastname}}
                                                        </td>
                                                        <td class="py-2 text-sm text-left">
                                                                {{$datauser->dni}}
                                                        </td>
                                                        <td class="py-2 text-sm text-left">
                                                                {{$datauser->cuil}}
                                                        </td>
                                                        <td class="py-2 text-sm text-left">
                                                                {{$datauser->phone}}
                                                        </td>
                                                        <td class="py-2 text-sm text-left ">
                                                                {{$datauser->email}}
                                                        </td>
                                                        @php
                                                           $color=statusColor($datauser->status->value);
                                                        @endphp
                                                        <td class="py-2 text-sm text-left {{$color}}">
                                                                {{str()->ucfirst($datauser->status->value)}}
                                                        </td>

                                                        <td class="py-2 text-sm text-center">
                                                                <div class="flex justify-end">
                                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                                <svg   wire:click="EmpleadoData({{$datauser->id}})"
                                                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                                                </svg>
                                                                        </div>
                                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                                <a href="{{route("editempleado",['id' => $datauser->id])}}" >
                                                                                <svg
                                                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                                                </svg>
                                                                                </a>
                                                                        </div>
                                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                                                </svg>
                                                                        </div>
                                                                </div>
                                                        </td>
                                                </tr>

                                        @endforeach
                                       </x-slot>
                                       <x-slot name="indexpagintatio">

                                       </x-slot>
                                </x-html.tablehtml>


                        @endif
                </div><!--End Content -->
                <br>
                @if(count($listusers)>0)
                  {{ $listusers->links() }}
                @endif
                <!--End Sector -->
        </div>
</div>
