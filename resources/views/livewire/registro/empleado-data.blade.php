<div class="relative p-4 w-full">
    <div class="bg-blue-100 w-full dark:bg-green-200 mb-6 shadow-md py-2 ">
        <span class="ml-3">Datos.</span>
        @php
            $color=statusColor($user->status->value);
        @endphp
        <h3 class="absolute -top-1 right-7 w-32 p-2 bg-yellow-200 border opacity-80 {{$color}} rounded
              text-xs font-merriweather text-center shadow">
            {{ str()->ucfirst($user->status->value)}}
        </h3>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Empresa.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->companie->companyname}}
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Número legajo.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->numberlegajo}}
            </label>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Nombre.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 " for="grid-first-name">
                {{$user->name}}
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Apellido
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->lastname}}
            </label>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                DNI.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->dni}}
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                CUIL
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->cuil}}
            </label>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Correo.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->email}}
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Dirección
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->address}}
            </label>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Fecha de nacimiento.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->datebirth}}
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Teléfono
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->phone}}
            </label>
        </div>
    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Cargo.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->grade?->namegrade? $user->grade->namegrade : '-'}}
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6 ">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Sector.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->sector?->namesector? $user->sector->namesector : '-'}}
            </label>
        </div>

    </div>
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-7 mb-6 md:mb-0">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                Responsable de área.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                @if($user->resposablearea)
                    {{'SI'}}
                @else
                    {{'NO'}}
                @endif
            </label>
        </div>
        <div class="md:w-1/2 px-3 ml-6">
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Fecha de contratación.
            </label>
            <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                {{$user->datecompany}}
            </label>
        </div>
    </div>
</div>