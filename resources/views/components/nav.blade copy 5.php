<nav class="bg-white h-auto fixed w-full z-20 top-0 left-0 border-gray-200 px-2 sm:px-4 py-2.5 text-black">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        {{-- Logo and User Information --}}
        <a href="/" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap flex items-center">
                {{-- <img class="object-cover h-12" src="https://iili.io/J76M4Qj.th.png" alt=""> --}}

            </span>
        </a>

        {{-- Sidebar Toggle Button --}}
        <button id="sidebarToggle" class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="text-white">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/>
            </svg>
        </button>

{{-- Sidebar --}}
<div id="sidebar" class="text-custom-50 w-48 md:w-32 rounded-[30px] fixed left-0 top-0 h-full bg-custom-50">
    <div class="flex items-center justify-center h-16">
        {{-- <a href="/admission-dashboard" class="text-white text-lg font-bold">                 --}}
        <a href="" class="text-white text-lg font-bold">                
            <img class="object-cover h-24 max-h-full mt-6" src="https://iili.io/J76M4Qj.th.png" alt="">
        </a>
    </div>

<!-- Sidebar Items -->
<ul class="text-white mt-6">
    <li>
        <a href="" class="block py-2 px-4">                
            @auth
                <h1 class="">ROLE-{{ ucfirst(auth()->user()->role) }}</h1>
            @else
                <h1 class="">STAFF NAME</h1>
            @endauth
        </a>
    </li>
    <li>
        <a href="{{ auth()->user()->role === 'admission' ? '/admission-dashboard' : '/nurse-dashboard' }}" class="block py-2 px-4">
            {{ auth()->user()->role === 'admission' ? 'Admission Dashboard' : 'Nurse Dashboard' }}
        </a>
    </li>
    <li>
        <a href="{{ auth()->user()->role === 'admission' ? '/admission-patients' : '/nurse-patients' }}" class="block py-2 px-4">
            {{ auth()->user()->role === 'admission' ? 'Admission Patients' : 'Nurse Patients' }}
        </a>
    </li>
    
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="block py-2 px-4">Logout</button>
        </form>
    </li>
</ul>
</div>


        {{-- Main Navigation Links --}}
        <div class="hidden w-full md:block md:w-auto" id="navbar-main">
            <x-items/>
        </div>
    </div>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.style.display = sidebar.style.display === 'none' || sidebar.style.display === '' ? 'block' : 'none';
        });
    </script>
</nav>
