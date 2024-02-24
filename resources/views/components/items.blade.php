<ul class="flex flex-col md:flex-row px-4">
    @auth
    <li>
        <a href="/add/patient" class="block py-2 pr-4 pl-3 bg-custom-50 rounded-lg text-white">+ Add Patient</a>
    </li>
    
    @else
    <li>
        <a href="/login" class="block py-2 pr-4 pl-3">Sign in</a>
    </li>
    <li>
        <a href="/register" class="block py-2 pr-4 pl-3">Sign up</a>
    </li>
    @endauth
</ul>