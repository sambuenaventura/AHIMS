<div x-data="{ open: false }" class="flex h-screen fixed bg-custom-50 w-64 z-20 top-0 left-0 border-r border-gray-200">
    <div class="flex flex-col items-start w-full py-4 px-4">
        <a href="/" class="text-white text-xl font-semibold mb-4">
            {{ $data['title'] }}
        </a>

        <button @click="open = !open" data-collapse-toggle="sidebar" class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="text-white"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </button>

        <div x-show="open" class="w-full md:block md:w-auto" id="sidebar">
            <x-items/>
        </div>
    </div>
</div>
