<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Digital Menu By BITS') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- Alpine --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="{{ asset('js/datatable.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('css/datatable.css')}}">

        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

        <style>
            [x-cloak] { 
      display: none !important;
   }
        </style>


        @yield('css')
    </head>
    <body class="font-sans antialiased dark:bg-gray-700 dark:text-slate-200 font-bold">

            {{-- For Mobile Nav --}}

                <div class="w-full md:hidden shadow-gray-300 bg-red-900 dark:bg-gray-800 shadow-md" x-data="{ isNav: false }">
                    <div class="flex justify-between items-center">
                        <a  class="mr-8" @click="isNav=true" ><i class="fa fa-bars text-gray-300"></i></a>
                    </div>

                    <div class="w-full px-8" x-show="isNav" @click.away ="isNav=false">
                        <ul class="my-8">

                            <a href="{{ route('dashboard') }}" class="block mt-1">
                                <li class="pl-4 text-lg py-2 font-semibold hover:bg-yellow-300 hover:text-gray-700
                                {{(request()->routeIs('dashboard'))? "bg-yellow-400 text-black" : "text-slate-200 font-bold"}} 
                                transition-colors ease-in-out delay-100">
                                    <i class="fa fa-tachometer"></i> &nbsp; Dashboard
                                </li>
                             </a>
                             
                             <a href="{{ route('notices.index') }}" class="block mt-1 ">
                                 <li class="pl-4 text-lg py-2   hover:bg-yellow-300 hover:text-gray-700 
                                 {{(request()->routeIs('notices.*'))? "bg-yellow-400 text-black dark:text-gray-700" : "text-slate-200 font-bold"}} 
                                 transition-colors ease-in-out delay-100">
                                     <i class="fa fa-files-o"></i> &nbsp;  Notices
                                 </li>
                              </a>

                              <a href="{{ route('testimonials.index') }}" class="block mt-1 ">
                                <li class="pl-4 text-lg py-2   hover:bg-yellow-300 hover:text-gray-700 
                                {{(request()->routeIs('testimonials.*'))? "bg-yellow-400 text-black dark:text-gray-700" : "text-slate-200 font-bold"}} 
                                transition-colors ease-in-out delay-100">
                                    <i class="fa fa-users"></i> &nbsp;  Testimonials
                                </li>
                             </a>
                              
                            
                              <form method="POST" action="{{ route('logout')}}">
                                @csrf
                             <button type="submit" class="block mt-4 w-full">
                                <li class="pl-4 text-lg text-left py-2 text-slate-200 font-bold hover:bg-yellow-300 hover:text-gray-700 transition-colors ease-in-out delay-100">
                                    <i class="fa fa-sign-out"></i> &nbsp; Logout
                                </li>
                            </button>
                            </form>
             
                             
                             
                           </ul>
                    </div>

                </div>


       <div class="w-full h-full flex">
            <div class="w-52 hidden md:flex">
                <div class="w-52 max-h-100 h-full bg-indigo-700 dark:bg-gray-800 dark:shadow-gray-700 shadow-lg shadow-red-500 fixed">
                <div class="bg-white dark:bg-gray-200 rounded-full w-44 h-44 mx-auto mt-6 flex justify-center content-center">
                    <a href="/dashboard" class="">
                        <img class="w-full mx-auto" src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
               <ul class="my-8">

                <a href="{{ route('dashboard') }}" class="block mt-1">
                   <li class="pl-4 text-lg py-2 font-semibold hover:bg-yellow-300 hover:text-gray-700
                   {{(request()->routeIs('dashboard'))? "bg-yellow-400 text-black" : "text-slate-200 font-bold"}} 
                   transition-colors ease-in-out delay-100">
                       <i class="fa fa-tachometer"></i> &nbsp; Dashboard
                   </li>
                </a>
                
                <a href="{{ route('notices.index') }}" class="block mt-1 ">
                    <li class="pl-4 text-lg py-2   hover:bg-yellow-300 hover:text-gray-700 
                    {{(request()->routeIs('notices.*'))? "bg-yellow-400 text-black dark:text-gray-700" : "text-slate-200 font-bold"}} 
                    transition-colors ease-in-out delay-100">
                        <i class="fa fa-files-o"></i> &nbsp;  Notice
                    </li>
                 </a>

                 <a href="{{ route('testimonials.index') }}" class="block mt-1 ">
                    <li class="pl-4 text-lg py-2   hover:bg-yellow-300 hover:text-gray-700 
                    {{(request()->routeIs('testimonials.*'))? "bg-yellow-400 text-black dark:text-gray-700" : "text-slate-200 font-bold"}} 
                    transition-colors ease-in-out delay-100">
                        <i class="fa fa-users"></i> &nbsp;  Testimonials
                    </li>
                 </a>
                

                 

                <form method="POST" action="{{ route('logout')}}">
                    @csrf
                 <button type="submit" class="block mt-4 w-full -pl-12">
                    <li class="pl-0 text-lg -ml-20 py-2 text-slate-200 font-bold hover:bg-yellow-300 hover:text-gray-700 transition-colors ease-in-out delay-100">
                        <i class="fa fa-sign-out"></i> &nbsp; Logout
                    </li>
                </button>
                </form>


                 
                 
               </ul>

            </div>  

            </div>
            @yield('content')
       </div>

       <div class="fixed right-2 top-2 text-slate-200 font-bold">
        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-slate-200 font-bold hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm ">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
        </button>
    </div>
       @yield('js')
      <script>
          var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});
      </script>
    </body>
</html>
