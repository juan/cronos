<div>
    <x-menubar.headermenu nameform="Registro / Sector"/>
    <div class="p-4 shadow-lg rounded-lg bg-indigo-200 text-gray-700 mt-2">
        <div class="flex items-center justify-between">
            <div class="pl-3 text-xl md:text-1xl text-slate-800 font-bold mb-1 px-1">
                Listado sectores.
            </div>
            <div>
                <button type="button" class="focus:outline-none text-white bg-green-700
               hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-mono to-neutral-50 font-bold
               rounded text-sm text-white  px-3 py-2.5 mr-1 mb-1
               dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        wire:click="viewcompany">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#FAF7F7" class="w-4 h-4 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>

                </button>
            </div>
        </div><!--End Two Sides -->
        <div class="flex items-center mt-4 ml-3">

            @if(count($listsector)==0)
                <div class="p-4 mb-4 flex w-full justify-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">No existen sectores registrados.</span>
                </div>
            @else
            <x-html.tablehtml heading="No.,Sector,Estatus,Opción">

                    @foreach($listsector as $datatr)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$loop->iteration}}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{$datatr->namesector}}
                            </td>
                            @php
                                $color=statusColor($datatr->status->value);
                            @endphp
                            <td class="py-3 px-6 text-left {{$color}}">
                                {{str()->ucfirst($datatr->status->value)}}
                            </td>

                            <td class="py-3 px-6 text-right">
                                <div class="flex justify-end">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </x-html.tablehtml>
            @endif
        </div><!--End Content -->
        @if($showmesagge)
            <div x-data="{ open: true }"
                 x-init="setTimeout(() => open = false , 3600)"
            >
                <div x-show="open">
                    <x-html.toasthtml :status="$status" :mesagge="$mesagge" />
                </div>
            </div>
        @endif
        <!--Register Sector -->
        <div
                x-data="{show: @entagle($attributes->wire('model'))}"
                x-show="show"
                @keydown.escape.window="show = false"

        >
            <x-jet-insert-modal wire:model="estatuswindow" maxWidth="md">
                <x-slot name="title">
                    {{ __('Agregar sector.') }}
                </x-slot>

                <x-slot name="content">
                    <form
                          wire:submit.prevent="savesector()" >
                        @csrf
                        <div class="relative">
                            <x-html.inputtexhtml wire:model.defer="namesector" id="namesector" label="Sector."/>
                        </div>
                        @if($errors->has('namesector'))
                            <div class="mt-0.5">
                                <x-jet-input-error message="{{ $errors->first('namesector') }}"></x-jet-input-error>
                            </div>
                        @endif

                    </form>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center space-x-4 mt-4">
                        <x-jet-danger-button wire:click="cleanform">Cancelar</x-jet-danger-button>
                        <x-jet-button
                                wire:loading.attr="disabled"
                                wire:click.prevent="savesector" >
                            <svg   wire:loading wire:target="savesector"

                                   class="animate-spin -ml-1  mr-2 h-2.5 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-60" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Guardar
                        </x-jet-button>
                    </div>
                </x-slot>

            </x-jet-insert-modal>
        </div>
        <!--End Sector -->
    </div>

</div>
