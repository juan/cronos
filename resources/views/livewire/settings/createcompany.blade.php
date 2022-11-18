<div>
    <x-menubar.headermenu nameform="Configuración / Empresa"/>

        <form class="form-horizontal form-material"
              wire:submit.prevent="savecompany()" >
            @csrf
            <div class="overflow-hidden  mt-0.5 ">
                <div class="bg-green-50 opacity-1 sm:rounded mb-2 py-7 ">
                   <div class="mx-14 space-y-4">
                        <div class="relative">
                            <div class="relative">
                                <x-html.inputtexhtml wire:model.defer="companyname" id="companyname" label="Empresa."/>
                            </div>
                            @if($errors->has('companyname'))
                                <div class="mt-0.5">
                                    <x-jet-input-error message="{{ $errors->first('companyname') }}"></x-jet-input-error>
                                </div>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="relative">
                                <x-html.inputtexhtml wire:model.defer="cuit" id="cuit" label="CUIT."/>
                            </div>
                            @if($errors->has('cuit'))
                                <div class="mt-0.5">
                                    <x-jet-input-error message="{{ $errors->first('cuit') }}"></x-jet-input-error>
                                </div>
                            @endif
                        </div>
                       <div class="flex mb-4 ">
                           <div class="relative w-1/2 mr-3">
                               <div class="relative">
                                   <x-html.inputtexhtml wire:model.defer="address" id="address" label="Dirección." />
                               </div>
                               @if($errors->has('address'))
                                   <div class="mt-0.5">
                                       <x-jet-input-error message="{{ $errors->first('address') }}"></x-jet-input-error>
                                   </div>
                               @endif
                           </div>
                           <div class="relative w-1/2">
                               <div class="relative ">
                                   <x-html.inputtexhtml wire:model.defer="number" id="number" label="Número."/>
                               </div>
                               @if($errors->has('number'))
                                   <div class="mt-0.5">
                                       <x-jet-input-error message="{{ $errors->first('number') }}"></x-jet-input-error>
                                   </div>
                               @endif
                           </div>
                       </div>
                       <div class="flex mb-4 ">
                           <div class="relative w-1/2 mr-3">
                               <div class="relative">
                                   <x-html.inputtexhtml wire:model.defer="phone" id="phone" label="Teléfono."/>
                               </div>
                               @if($errors->has('phone'))
                                   <div class="mt-0.5">
                                       <x-jet-input-error message="{{ $errors->first('phone') }}"></x-jet-input-error>
                                   </div>
                               @endif
                           </div>
                           <div class="relative w-1/2">
                               <div class="relative ">
                                   <x-html.inputtexhtml wire:model.defer="zipcode" id="zipcode" label="CP."/>
                               </div>

                           </div>
                       </div>
                       <div class="flex mb-4 ">
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
                               <div class="relative ">
                                   <x-html.inputtexhtml wire:model.defer="web" id="web" label="Web."/>
                               </div>

                           </div>
                       </div>
                   </div>
            </div>


                <x-menubar.footerbuttons>
                    <x-jet-danger-button wire:click="cleanform">Cancelar</x-jet-danger-button>
                    <x-jet-button
                            wire:loading.attr="disabled"
                            wire:click.prevent="savecompany" >
                        <svg   wire:loading wire:target="savecompany"
                                class="animate-spin -ml-1  mr-2 h-2.5 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-60" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Guardar
                    </x-jet-button>
                </x-menubar.footerbuttons>
            </div>

        </form>
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
