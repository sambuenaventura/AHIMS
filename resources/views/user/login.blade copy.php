@include('partials.header')
    <header class="max-w-lg mx-auto">
        <a href="">
            <h1 class="text-4xl font-bold text-white text-center"></h1>
        </a>
    </header>
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
        <section>
            <h3 class="font-bold text-2xl">Hospital Information Management System Login</h3>
            <p class="text-gray-600 pt-2">
                Sign up for a new account
                <a href="/register" class="text-custom-600 font-bold">here</a>
            </p>
        </section>
        <section class="mt-10">
            <form action="/login/process" method="POST" class="flex flex-col">
                @csrf

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                        Email
                    </label>
                    <input type="email" name="email" autocomplete="off" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('email')
                        <p class="text-red-500 text-xs p-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                        Password
                    </label>
                    <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('password')
                        <p class="text-red-500 text-xs p-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                        Select Role
                    </label>
                    <select name="role" id="role" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                        <option value="nurse">Nurse</option>
                        <option value="admission">Admission</option>
                        <option value="radtech">Radtech</option>
                        <option value="medtech">Medtech</option>
                    </select>
                </div>
                <button type="submit" class="bg-custom-600 hover:bg-custom-600-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Login</button>
            </form>
        </section>
    </main>
@include('partials.footer')
