<div>
    <x-html.sidebarmenu arrayopcion="Registro,Consulta" arraylinks="rempleado,listuser"/>
    <x-menubar.headermenu nameform="Registro / Empleado / Editar"/>
    <form action="#"
          id="datauserform"
          wire:submit.prevent="edituserData()"
          enctype="multipart/form-data"
          method="POST">
        @csrf
        <div class="space-y-3 bg-white px-4 py-5 sm:p-6">
            <x-html.headinghtml>
                Datos personales
            </x-html.headinghtml>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">
                    <div class="relative">
                        <x-html.inputtexhtml wire:model.defer="name" id="name" label="Nombre."/>
                    </div>
                    @if($errors->has('name'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('name') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
                <div class="relative w-1/2">
                    <div class="relative ">
                        <x-html.inputtexhtml wire:model.defer="lastname" id="lastname" label="Apellido."/>
                    </div>
                    @if($errors->has('lastname'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('lastname') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">
                    <div class="relative">
                        <x-html.inputtexhtml
                                x-mask="99999999999999999999"
                                wire:model.defer="dni" id="dni" label="DNI."/>
                    </div>
                    @if($errors->has('dni'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('dni') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
                <div class="relative w-1/2">
                    <div class="relative ">
                        <x-html.inputtexhtml
                                x-mask="99999999999999999999"
                                wire:model.defer="cuil" id="cuil" label="CUIL."/>
                    </div>
                    @if($errors->has('cuil'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('cuil') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">
                    <div class="relative">
                        <x-html.inputtexhtml wire:model.defer="email" id="email" label="Correo."/>
                    </div>
                    @if($errors->has('email'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('email') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
                <div class="relative w-1/2">
                    <div class="relative">
                        <x-html.inputtexhtml wire:model.defer="address" id="address" label="Dirección."/>
                    </div>
                    @if($errors->has('address'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('address') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">
                    <div class="relative">
                        <x-html.datepickerhtml   wire:model.defer="datebirth" id="datebirth" label="Fecha de nacimiento."/>
                    </div>
                    @if($errors->has('datebirth'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('datebirth') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
                <div class="relative w-1/2">
                    <div class="relative ">
                        <x-html.inputtexhtml
                                x-mask="99999999999999999999"
                                wire:model.defer="phone" id="phone" label="Teléfono."/>
                    </div>
                    @if($errors->has('phone'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('phone') }}"></x-jet-input-error>
                        </div>
                    @endif

                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">

                    <x-html.selecthtml wire:model.defer="grade_id" id="grade_id" label="Cargo.">
                        <option value=""></option>
                        @if(count($listgrade)>=1)
                            @foreach($listgrade as $datagrade)
                                <option value="{{$datagrade->id}}">{{$datagrade->namegrade}}</option>
                            @endforeach
                        @endif
                    </x-html.selecthtml>
                </div>
                <div class="flex w-1/2">
                    <div class="relative w-1/2">
                        <x-html.selecthtml
                                wire:model.defer="sector_id" id="sector_id" label="Sector.">
                            <option value=""></option>
                            @if(count($listsector)>=1)
                                @foreach($listsector as $datasector)
                                    <option value="{{$datasector->id}}">{{$datasector->namesector}}</option>
                                @endforeach
                            @endif
                        </x-html.selecthtml>
                    </div>
                    <div class="flex items-center ml-2">

                        <input  x-bind:disabled="estado"

                                wire:model.defer="resposablearea"
                                id="resposablearea" type="checkbox"
                                value="true" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300
                                   focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2
                                   dark:bg-gray-700 dark:border-gray-600">

                        <label for="resposablearea" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Responsable de área?</label>
                    </div>
                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">
                    <div class="relative">
                        <x-html.datepickerhtml wire:model.defer="datecompany" id="datecompany" label="Fecha de contratación."/>
                    </div>
                    @if($errors->has('datecompany'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('datecompany') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>

                <div class="relative w-1/2">
                    <div class="relative ">
                        <x-html.inputtexhtml wire:model.defer="numberlegajo" id="numberlegajo" label="Número Legajo."/>
                    </div>
                    @if($errors->has('numberlegajo'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('numberlegajo') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="relative w-1/2 mr-3">
                        <x-html.selecthtml
                                wire:model.defer="status" id="status" label="Estatus.">
                            @if(count($appformstatus)>=1)
                                @foreach($appformstatus as $statu)
                                    <option value="{{$statu->value}}">{{strtoupper($statu->value)}}</option>
                                @endforeach
                            @endif
                        </x-html.selecthtml>
                </div>
            </div>
            <div class="flex items-start  mb-4 ">
                <div class="flex items-start ">
                    <div class="flex items-start  mb-4 ">
                        <x-html.uploadhtml id="profile_photo_path" :namefoto="$profile_photo_path"/>
                    </div>
                    @if($errors->has('profile_photo_path'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('profile_photo_path') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
            </div>
        </div>
            <x-menubar.footerbuttons>
                <x-jet-danger-button wire:click="cleanform">Cancelar</x-jet-danger-button>
                <x-jet-button
                        wire:loading.attr="disabled"
                        wire:click.prevent="edituserData" >
                    <svg   wire:loading wire:target="edituserData"

                           class="animate-spin -ml-1  mr-2 h-2.5 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-60" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Guardar
                </x-jet-button>
            </x-menubar.footerbuttons>
    </form>

    @if($showmesagge)
        <div x-data="{ open: true }"
             x-init="setTimeout(() => open = false , 3600)"
        >
            <div
                    x-show="open"
                    x-transition:enter-start="opacity-0 scale-125"
                    x-transition:enter-end="opacity-100 scale-100"
            >
                <x-html.toasthtml :status="$statusmeesage" :mesagge="$mesagge" />
            </div>
        </div>
    @endif
</div>
