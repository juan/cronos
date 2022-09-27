<div class="flex" wire:ignore>
    <button id="states-button" data-dropdown-toggle="dropdown-states" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
        Empresa
    </button>

    <select wire:model="companyid" id="states"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg
                   border-l-gray-100 dark:border-l-gray-700 border-l-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                  dark:focus:ring-blue-500 dark:focus:border-blue-500 w-44"
            wire:click="setssesionid"
           >
        <option value="-">Selecionar empresa</option>
        @if($listcompany)
         @foreach($listcompany as $datacompany)
                <option value="{{$datacompany->id}}">{{$datacompany->companyname}}</option>
         @endforeach
        @endif
    </select>
</div>
