<div>
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <a @click.prevent="$root.submit()"
            href="{{ route('logout') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Salir</a>

    </form>

</div>
