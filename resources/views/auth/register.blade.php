<!DOCTYPE html>

    <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
    <section class="bg-[url('https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/background.jpg')] bg-no-repeat bg-cover bg-center bg-gray-700 bg-blend-multiply bg-opacity-60">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:mt-0">
            <div class="w-full bg-white rounded-lg shadow sm:max-w-md xl:p-0 dark:bg-gray-800">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h2 class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl dark:text-white">
                        Create your Account
                    </h2>
                    <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                        @csrf
                        <!-- Name -->
                        <div>
                            <label for="FirstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">FirstName</label>
                            <input type="text" name="FirstName" id="FirstName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" :value="old('FirstName')" required autofocus autocomplete="FirstName" />
                            <x-input-error :messages="$errors->get('FirstName')" class="mt-2" />
                        </div>
                        <div>
                            <label for="LastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LastName</label>
                            <input type="text" name="LastName" id="LastName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" :value="old('LastName')" required autofocus autocomplete="LastName" />
                            <x-input-error :messages="$errors->get('LastName')" class="mt-2" />
                        </div>
                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="Email" name="Email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" :value="old('Email')" required autocomplete="Email" />
                            <x-input-error :messages="$errors->get('Email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="Password" id="Password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('Password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="Password_confirmation" id="Password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required autocomplete="new-password" />                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <button type="submit" class="ms-4 w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </body>

