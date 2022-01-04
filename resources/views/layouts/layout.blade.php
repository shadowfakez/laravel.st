<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <div class="row">
                        <div class="col-auto mr-auto p-2">Hello , {{ Auth::user()->name }}!</div>
                        <div class="col-auto mr-auto"><button class="btn btn-primary"><a class="btn btn-primary p-0 m-0" href="{{ route('users.index') }}">Users</a></button></div>
                        <div class="col-auto mr-auto"><button class="btn btn-success"><a class="btn btn-success p-0 m-0" href="{{ route('task.index') }}">Tasks</a></button></div>
                        <div class="col-auto">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-secondary">
                                    <a class="btn btn-secondary p-0 m-0"
                                       role="button">Logout</a>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>

        @endif

        @yield('content')
    </div>
    </body>
</html>
