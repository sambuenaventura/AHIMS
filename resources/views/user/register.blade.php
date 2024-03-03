@include('partials.header')
    <header class="max-w-lg mx-auto">
        <a href="">
            <h1 class="text-4xl font-bold text-white text-center"></h1>
        </a>
    </header>
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
        <section>
            <h3 class="font-bold text-2xl">Hospital Information Management System Registration</h3>
            <p class="text-gray-600 pt-2">
                Sign in to your account
                <a href="/login" class="text-custom-600 font-bold">here</a>
            </p>
        </section>
        <section class="mt-10">
            <form action="/store" method="POST" class="flex flex-col">
                @csrf <!-- Protects our data from URL -->
            
                <div class="flex">
                    <!-- First Name -->
                    <div class="flex-1 mr-1 mb-6 pt-3 rounded bg-gray-200">
                        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            First Name
                        </label>
                        <input type="text" name="first_name" autocomplete="off" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value="{{ old('first_name') }}">
                        @error('first_name')
                            <p class="text-red-500 text-xs p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
            
                    <!-- Last Name -->
                    <div class="flex-1 ml-1 mb-6 pt-3 rounded bg-gray-200">
                        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                            Last Name
                        </label>
                        <input type="text" name="last_name" autocomplete="off" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value="{{ old('last_name') }}">
                        @error('last_name')
                            <p class="text-red-500 text-xs p-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                        Role
                    </label>
                    <select name="role" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                        <option value="" {{old('role') == "" ? 'selected' : ''}}></option>
                        <option value="admission" {{old('role') == "admission" ? 'selected' : ''}}>Admission</option>
                        <option value="nurse" {{old('role') == "nurse" ? 'selected' : ''}}>Nurse</option>
                        <option value="medtech" {{old('role') == "medtech" ? 'selected' : ''}}>Medical Technologist</option>
                        <option value="radtech" {{old('role') == "radtech" ? 'selected' : ''}}>Radiologic Technologist</option>
                        <option value="admin" {{old('role') == "admin" ? 'selected' : ''}}>Admin</option>
                    </select>                    
                    @error('role')
                        <p class="text-red-500 text-xs p-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                        HAU Email
                    </label>
                    <input type="email" name="email" autocomplete="off" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3" value={{old('email')}}>
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
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs p-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <button class="bg-success hover:bg-success text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Register</button>
            </form>
        </section>
    </main>
@include('partials.footer')