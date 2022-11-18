<div>
    <div x-data="{ dropdownOpen: false }" class="relative">
        <button @click="dropdownOpen = ! dropdownOpen"
                class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
            <img class="h-full w-full object-cover"
                 src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
                 alt="Your avatar">
        </button>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
             style="display: none;"></div>

        <div x-show="dropdownOpen"
             class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
             style="display: none;">
            <a href=""
               @click="open = false" @focus="open = true" @focusout="open = false"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Perfil</a>
            <a href="#"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Products</a>
            @livewire('settings.log-out')

        </div>
    </div>
</div>

