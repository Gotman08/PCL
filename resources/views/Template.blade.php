<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Title -->
    <title>PrivatKopie™</title>
    
    <!-- Vite's handling of CSS and JS files -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Flowbite CSS for additional components -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('Image/Logeau.png') }}">
    
    <!-- SEO Meta Tags -->
    <meta name="author" content="PrivatKopie">
    
    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Your Website Title">
    <meta property="og:description" content="Describe your web page.">
    <meta property="og:image" content="{{ asset('path/to/image.jpg') }}">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ url()->current() }}">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Your Website Title">
    <meta name="twitter:description" content="Describe your web page.">
    <meta name="twitter:image" content="{{ asset('path/to/image.jpg') }}">

    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
    </script>


  <body>
    <header>
    @include('NavBar')
    
    @yield('BeginNavBar')
    @yield('BeginCenterNavBar')
    @yield('TogglerDarkMode')
    

    @if(Auth::check())
        @yield('ProfileIconNavBar')
        @yield('LogOutNavBar')
    
    @else
        @yield('LoginNavBar')
        @yield('RegisterNavBar')
    
    @endif


    @yield('MainMenuButton')
    @yield('EndCenterNavBar')
    @yield('ContentNavBar')
    @yield('EndNavBar')

    </header>
    
    @yield('Start')
    @yield('apropos')
    @yield('company')
    @yield('contact')
    @yield('Team')
    @yield('application')
    
    @if(Auth::check())
        @yield('user')
    @else
        @php
        return redirect()->route('login');
        @endphp
    @endif


    
    @include('Footer')
    @yield('footer')

  <script src="PrivateCopieLetz\public\JS\js.js"></script>
  </body>


    

</html>