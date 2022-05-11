<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a style="float: right;" href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @can('subs-only', Auth::user())
                        <a style="float: right;" href="{{ url('/subs') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Subscribe</a>
                        @endcan

                        @can('subsciber-only', Auth::user())
                        <a style="float: right;" href="{{ url('/subs') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Subscribe  only</a>
                        @endcan

                        
                    @else
                        <a style="float: right;" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div style="width:100vw;height:100vh;display:grid;place-items:center">
                <div>
                    <h3>Welcom To My Website</h3>
                </div>
            </div>
        </div>
    </body>
</html>
