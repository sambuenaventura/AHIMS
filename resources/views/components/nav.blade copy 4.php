<nav x-data="{ open: false }" class="bg-custom-50 h-auto fixed w-full z-20 top-0 left-0 border-gray-200 px-2 sm:px-4 py-2.5 text-white">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="/" class="flex items-center">
      <span class="self-center text-xl font-semibold whitespace-nowrap flex items-center">
          <img class="object-cover h-12" src="https://iili.io/J76M4Qj.th.png" alt="">
          @auth
              <h1 class="ml-2">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }} - {{ ucfirst(auth()->user()->role) }}</h1>
          @else
              <h1 class="ml-2">STAFF NAME</h1>
          @endauth
      </span>
  </a>
  
      <button @click="open = !open" data-collapse-toggle="navbar-main" class="md:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="text-white"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></button>
      <div x-show="open" class="text-custom-50 w-full md:block md:w-auto" id="navbar-main">
          <x-items/>
      </div>
      <div class="hidden w-full md:block md:w-auto" id="navbar-main">
          <x-items/>
      </div>
  </div>
</nav>