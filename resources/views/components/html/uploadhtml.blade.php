@props([
'id',
'namefoto'=>false
])
<div class="relative w-1/2 mr-3">
    <div
            x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3"
    >

        <input wire:model="{{$id}}" type="file" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
    ">


        <label class="block text-sm font-medium text-gray-700">Foto.</label>
        <div class="mt-1 flex items-center">
                         <span class="inline-block items-center h-20 w-20 rounded-full bg-gray-100">
                             <span class="flex items-center justify-center w-20 h-20 rounded-full m-auto shadow " x-show="! photoPreview">
                               @if(!$namefoto)
                                 <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 ">
                                       <path stroke-linecap="round"
                                             stroke-linejoin="round"
                                             d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                 @else
                                     <img class="w-20 h-20 rounded-full" src="{{ Storage::url($namefoto) }}"  alt="Default avatar">
                                 @endif
                             </span>
                             <div  x-show="photoPreview" style="display: none;">
                               <span class="block w-20 h-20 rounded-full m-auto shadow"
                                     x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"
                                     style="background-size: cover; background-repeat: no-repeat;
                                     background-position: center center; background-image: url('null');">
                               </span>
                             </div>
                          </span>

            <button
                    x-on:click.prevent="$refs.photo.click()"
                    data-tooltip-target="tooltip-light"
                    data-tooltip-placement="right"
                    class="ml-4 bg-blue-500 hover:bg-blue-700 text-white text-xs font-bold py-2 px-4 rounded">
                <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
                </svg>
            </button>

             <div id="tooltip-light" role="tooltip" class="w-full absolute invisible z-10
                       ml-2 mr-2 text-xs text-gray-900 bg-blue-100 rounded py-1
                       border border-gray-200 shadow-sm opacity-0 tooltip">
                &nbsp;&nbsp;&nbsp;Cargar archivo
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</div>