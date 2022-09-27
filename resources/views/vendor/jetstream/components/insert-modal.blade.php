@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <div class="sm:flex sm:items-start">
        <div class="mt-3 mb-9 text-left sm:mt-2 sm:ml-4  sm:text-left sm:mr-9 grow">
            <div class="flex max-w-md mx-auto justify-between items-start pl-1 pt-3 rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $title }}
                </h3>
            </div>
            <div class="items-start mt-4 max-w-md mx-auto">
                {{ $content }}
            </div>
        </div>
    </div>


    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
