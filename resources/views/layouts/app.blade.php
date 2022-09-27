<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cronos') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js',
    'node_modules/flowbite/dist/flowbite.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-slate-100 antialiased">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
             class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
             class="fixed z-30 inset-y-0 left-0 w-64 transition
                 duration-300 transform bg-slate-700 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <!--Beginning Right Side!-->
            <x-menubar.logo/>
            <x-menubar.menus/>

            <!--Beginning Right Side!-->
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-2 border-green-200 shadow">
                <!--Beginning Right Side!-->
                <div class="flex items-center space-x-2">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <x-menubar.search/>

                </div><!--End Right Side!-->
                <div wire:ignore>
                    @livewire('settings.headingcompany')
                </div>
                <!--Beginning Left Side!-->
                <div class="flex items-center space-x-1">
                    <x-menubar.helpapp/>
                    <x-menubar.notifications/>
                    <x-menubar.user/>
                </div><!--End Left Side!-->
            </header>
            <!--Beginning Content!-->
            <!-- Page Content -->
            <main class="overflow-auto pr-0.5 pl-0.5 ">
                {{ $slot }}
            </main>
            <!--End Content!-->
        </div>

    </div>


</div>
@livewire('livewire-ui-modal')


@stack('modals')
@livewireScripts
</body>
</html>
