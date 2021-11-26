<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8eccf2802e.js" crossorigin="anonymous"></script>
        <title>Silencify</title>
    </head>
    <body>
        <div class="px-6 py-2">
            <nav class="flex items-center justify-between flex-wrap p-6">
                <div class="flex items-center flex-no-shrink text-white mr-6">
                    <a href="/">
                        <img src="/images/small-logo.png" alt="Logo">
                    </a>
                </div>

                <div class="block lg:hidden">
                    <button data-toggle-hide="[data-nav-content]" class="flex items-center px-3 py-2 border rounded">
                        <i class="fas fa-bars"></i>
                        <!-- <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                        </svg> -->
                    </button>
                </div>

                <div data-nav-content="" class="w-full block flex-grow lg:flex items-center lg:w-auto hidden">
                    <div class="text-sm lg:flex-grow">
                        <a href="/" class="block lg:inline-block lg:text-center lg:w-24 lg:mt-0 lg:py-2 py-3 pl-2 lg:px-3 rounded hover:bg-gray-200 hover:text-gray-800">
                            Genres
                        </a>
                        <a href="/songs" class="block lg:inline-block lg:text-center lg:w-24 lg:mt-0 lg:py-2 py-3 pl-2 lg:px-3 rounded hover:bg-gray-200 hover:text-gray-800">
                            Songs
                        </a>
                        <a href="#" class="block lg:inline-block lg:text-center lg:w-24 lg:mt-0 lg:py-2 py-3 pl-2 lg:px-3 rounded hover:bg-gray-200 hover:text-gray-800">
                            Playlists
                        </a>
                    </div>

                    <div class="text-sm lg:flex-shrink">
                        <a href="#" class="block lg:inline-block lg:text-center lg:w-20 lg:mt-0 lg:px-3 lg:py-1 pl-2 py-3 rounded lg:uppercase lg:text-xs lg:font-semibold lg:hover:bg-blue-600 lg:hover:text-white hover:bg-gray-200 hover:text-gray-800">
                            Login
                        </a>
                        <a href="#" class="block lg:inline-block lg:text-center lg:w-20 lg:text-white lg:mt-0 lg:ml-3 lg:px-3 lg:py-1 pl-2 py-3 rounded lg:uppercase lg:text-xs lg:font-semibold lg:bg-blue-600 lg:hover:bg-blue-500 lg:hover:text-white hover:bg-gray-200 hover:text-gray-800">
                            Register
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        {{ $slot }}

        <footer class="px-6 py-2">
            <div class="bg-white text-center mt-5 mb-1 text-xs">
                &copy; Silencify, Diony Busker 2021
            </div>
        </footer>

{{--        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
        <script type="text/javascript" src="{{asset('js/responsive-menu.js')}}"></script>
    </body>
</html>
