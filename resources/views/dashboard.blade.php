<x-app-layout>

    <!-- component -->
    <div>


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
                        <button
                                class="w-8 h-8 flex items-center justify-center bg-slate-100
                           hover:bg-slate-200 transition duration-150 rounded-full">
                            <svg class="w-4 h-4" viewBox="0 0 16 16">
                                <path class="fill-current text-slate-500"
                                      d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"/>
                                <path class="fill-current text-slate-400"
                                      d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"/>
                            </svg>
                        </button>

                    </div><!--End Right Side!-->
                    <!--Beginning Left Side!-->
                    <div class="flex items-center space-x-1">
                        <x-menubar.helpapp/>
                        <x-menubar.notifications/>
                        <x-menubar.user/>
                    </div><!--End Left Side!-->
                </header>
                <!--Beginning Content!-->
                <div class="container-fluid pr-0.5 pl-0.5 overflow-auto">
                    @yield('content')

                </div>
                <!--End Content!-->
            </div>

        </div>

    </div>

</x-app-layout>
