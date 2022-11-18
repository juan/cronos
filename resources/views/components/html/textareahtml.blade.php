@props([
'id',
'label'
])
<div>
    <textarea id="{{$id}}" name="{{$id}}" {{ $attributes }} rows="4" class="resize-none rounded-md block px-1.5 pb-1.5 pt-2.5  w-full text-sm text-gray-900 bg-transparent rounded-lg border-1
            border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500
            focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "
              autocomplete="off"></textarea>
    <label for="{{$id}}" class="absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
    bg-green-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500
    peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/4
    peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">{{$label}}</label>
</div>