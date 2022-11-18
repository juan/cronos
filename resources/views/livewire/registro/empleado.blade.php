    <div>
        <x-html.sidebarmenu arrayopcion="Registro,Consulta" arraylinks="rempleado,listuser"/>
        <x-menubar.headermenu nameform="Registro / Empleado"/>
        <form action="#"
              id="datauserform"
              wire:submit.prevent="saveuserData()"
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
                    <div class="flex w-1/2"
                         x-data="seeResponsable"
                        >
                        <div class="relative w-1/2">
                            <x-html.selecthtml
                                    wire:model.defer="sector_id" id="sector_id" label="Sector."
                                    x-model="sector"
                                    x-on:change.debounce="cambiocaja">
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
                                    x-model="respbox"
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
                <!-------End off basic data user---!---->


            </div>
            <!--User passwword-!-->
            <div class="space-y-3 bg-white px-4 py-5 sm:p-6">
                <x-html.headinghtml>
                    Datos usuarios
                </x-html.headinghtml>
                <div class="flex items-start  mb-4 ">
                    <div class="relative w-1/2 mr-3">
                        <div class="relative">
                            <x-html.passwordhtml wire:model.defer="password" id="password" label="Contraseña."/>
                        </div>
                        <div class="flex items-center mt-1 text-red-700">
                            <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                            >
                                <path
                                        fill-rule="evenodd"
                                        d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                        clip-rule="evenodd"
                                />
                            </svg>
                            <p class="ml-1 text-xs">La contraseña debe tener al menos 9 caracteres, un dígito, una minúscula y una mayúscula</p>
                        </div>
                        @if($errors->has('password'))
                            <div class="mt-0.5">
                                <x-jet-input-error message="{{ $errors->first('password') }}"></x-jet-input-error>
                            </div>
                        @endif
                    </div>

                    <div class="relative w-1/2">
                        <div x-data="changePasword()"
                                class="relative ">
                            <x-html.passwordhtml
                                    x-bind:type="typeinput"
                                                 wire:model.defer="password_confirmation"
                                                 id="password_confirmation" label="Confirmar contraseña."/>
                            <span class="flex absolute right-0 bg-transparent
                                         rounded text-base text-gray-600 -my-6 mr-3
                                         cursor-pointer
                                         ">
                                <svg
                                        @click="passwordChange"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                          d= "M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                                        />
                                </svg>
                            </span>
                        </div>
                        @if($errors->has('password_confirmation'))
                            <div class="mt-0.5">
                                <x-jet-input-error message="{{ $errors->first('password_confirmation') }}"></x-jet-input-error>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex items-start ">
                    <div class="flex items-start mb-4 ">
                        <x-html.uploadhtml id="profile_photo_path" />
                    </div>
                    @if($errors->has('profile_photo_path'))
                        <div class="mt-0.5">
                            <x-jet-input-error message="{{ $errors->first('profile_photo_path') }}"></x-jet-input-error>
                        </div>
                    @endif
                </div>
            </div>
            <!--End user password-!-->
            <x-menubar.footerbuttons>
                <x-jet-danger-button wire:click="cleanform">Cancelar</x-jet-danger-button>
                <x-jet-button
                        wire:loading.attr="disabled"
                        wire:click.prevent="saveuserData" >
                    <svg   wire:loading wire:target="saveuserData"

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
         <script>
           let changePasword = () =>{
               return {typeinput: 'password',
                       icono: "" ,
                   passwordChange(){
                      if(this.typeinput== 'password'){
                          this.typeinput='text'
                      }else{
                          this.typeinput='password'
                      }
                   }
               };
           }
          let seeResponsable = () => {
               return {  estado: 'true',
                         respbox: '',
                         sector: '',
                   cambiocaja(){
                     if(this.sector !== ''){
                         this.estado = false
                     }else{
                         this.respbox = false
                         this.estado = true
                     }
                   }
               };
           }
         </script>
    </div>