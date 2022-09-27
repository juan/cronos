<div>
    <button

            class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
            aria-controls="search-modal"
            wire:click="$set('estatuswindow',true)"
            >

        <svg class="w-4 h-4" viewBox="0 0 16 16" >
            <path class="fill-current text-slate-500" d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
            <path class="fill-current text-slate-400" d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
        </svg>
    </button>
     <div
             x-data="{show: @entagle($attributes->wire('model'))}"
             x-show="show"
             @keydown.escape.window="show = false"
     >
        <x-jet-confirmation-modal wire:model="estatuswindow" maxWidth="sm">
            <x-slot name="title">
                {{ __('Remove Subscriber') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Realmente desea borrar arcvhivo?') }}
            </x-slot>
            <x-slot name="footer">
               {{'Hola Yura'}}
            </x-slot>

        </x-jet-confirmation-modal>
     </div>
</div>
