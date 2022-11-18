<div>
    <x-html.sidebarmenu arrayopcion="Registro,Consulta" arraylinks="rearchipublic,rearchipublic"/>
    <x-menubar.headermenu nameform="Publicación / Gestión"/>
    <div class="p-4 shadow-lg rounded-lg bg-indigo-200 text-gray-700 mt-2">
        <div class="flex items-center justify-between">
            <div class="pl-3 text-xl md:text-1xl text-slate-800 font-bold mb-1 px-1">
                Listado archivos.
            </div>
            <div>
                <button type="button" class="focus:outline-none text-white bg-green-700
               hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-mono to-neutral-50 font-bold
               rounded text-sm text-white  px-3 py-2.5 mr-1 mb-1
               dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        wire:click="createFile">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#FAF7F7" class="w-4 h-4 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>

                </button>
            </div>
        </div><!--End Two Sides -->
        <div class="flex grid mt-2 ">

            @if(count($listdocuments)==0)
                <div class="p-4 mb-4 flex w-full justify-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">No existen archivos registrados.</span>
                </div>

            @else
              @foreach($listdocuments as $data)
                    <x-html.documetfilehtml :data="$data"></x-html.documetfilehtml>
              @endforeach

            @endif
        </div><!--End Content -->
        <!--Register Sector -->
        <div
                x-data="{show: @entagle($attributes->wire('model'))}"
                x-show="show"
                @keydown.escape.window="show = false"

        >
            <x-jet-insert-modal wire:model="estatuswindow" maxWidth="md">
                <x-slot name="title">
                    {{ __('Agregar archivo.') }}
                </x-slot>

                <x-slot name="content">
                    <form
                            wire:submit.prevent="saveFile()" >
                        @csrf
                        <div class="relative">
                            <x-html.inputtexhtml wire:model.defer="namedocument" id="namedocument" label="Archivo."/>
                        </div>


                        <div class="flex items-center mt-1 text-blue-600">
                            <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                            >
                                <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                />
                            </svg>
                            <p class="ml-1 text-xs">Nombre de archivo, para registro de documentos.</p>
                        </div>
                        @if($errors->has('namedocument'))
                            <div class="mt-0.5">
                                <x-jet-input-error message="{{ $errors->first('namedocument') }}"></x-jet-input-error>
                            </div>
                        @endif
                        <div class="relative pt-5">
                            <div class="relative">
                                <x-html.textareahtml wire:model.defer="descripcion" id="descripcion" label="Descripción."/>
                            </div>
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <div class="flex items-center space-x-4 mt-4">
                        <x-jet-danger-button wire:click="cleanform">Cancelar</x-jet-danger-button>
                        <x-jet-button
                                wire:loading.attr="disabled"
                                wire:click.prevent="saveFile" >
                            <svg
                                   wire:loading wire:target="saveFile"
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
    @if($showmesagge)
        <div x-data="{ open: true }"
             x-init="setTimeout(() => open = false , 3600)"
        >
            <div x-show="open">
                <x-html.toasthtml :status="$status" :mesagge="$mesagge" />
            </div>
        </div>
    @endif
</div>
