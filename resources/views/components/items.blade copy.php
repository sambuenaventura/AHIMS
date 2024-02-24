<ul class="flex flex-col md:flex-row px-4">
    @auth
    <li>
        <a href="/admission" class="block py-2 pr-4 pl-3">Admission</a>
    </li>
    <li>
        <a href="/add/patient" class="block py-2 pr-4 pl-3">Add Patient</a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="block py-2 pr-4 pl-3">Logout</a>
        </form>
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