<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<section class="bg-[url('https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/background.jpg')] bg-no-repeat bg-cover bg-center bg-gray-700 bg-blend-multiply bg-opacity-60">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen pt:mt-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800">
                <div class="p-6 space-y-4 md:space-y-6 lg:space-y-8 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="Email" :value="__('Your email')" />
                            <x-text-input id="Email" type="Email" name="Email" :value="old('Email')" required autofocus class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('Email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="Password" :value="__('Password')" />
                            <x-text-input id="Password" type="Password" name="Password" required autocomplete="current-password" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('Password')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                                <label for="remember" class="ml-3 text-sm text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors duration-200">
                            Log in to your account
                        </button>

                        <p class="text-sm font-light text-center text-gray-500 dark:text-gray-300">
                            <a href="{{ route('Register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Don't have an account?</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('Footer')
    @yield('footer')
</body>
</html>