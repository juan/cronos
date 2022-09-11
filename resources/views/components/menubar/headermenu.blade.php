@props([
'nameform',
])

<div class="relative bg-indigo-200 p-6 sm:p-1 ">
    <!-- Content -->
    <div class="headers-form flex">
        <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"></path>
        </svg>
        <h1 class="text-1xl md:text-1xl text-slate-800 font-bold mb-1 px-1">{{$nameform}}</h1>
    </div>

</div>

