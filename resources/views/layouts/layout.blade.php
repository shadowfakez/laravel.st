<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <div class="row g-0">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-auto mr-auto"><a class="btn btn-outline-primary" href="{{ route('users.index') }}">Users</a></div>
                            <div class="col-auto mr-auto"><a class="btn btn-outline-success" href="{{ route('task.index') }}">Tasks</a></div>
                        </div>
                    </div>
                @auth
                    <div class="col-6">
                        <div class="row justify-content-end">
                            <div class="col-auto mr-auto p-2 text-right">
                                <h5>Hello, {{ Auth::user()->name }}!</h5>
                            </div>
                            <div class="col-auto">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                        <button class="btn btn-outline-dark" type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-6">
                        <div class="row justify-content-end">
                            <div class="col-auto mr-auto"><a class="btn btn-outline-dark" href="{{ route('login') }}">Log in</a></div>
                            @if (Route::has('register'))
                                <div class="col-auto mr-auto"><a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a></div>
                            @endif
                        </div>
                    </div>
                @endauth
                </div>
            </div>
        @endif
            <hr>

            @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <li>{{ $error }}</li>
                    <button type="button" class="p-0.5 m-0.2 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            @endif

            @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        @yield('content')
    </div>
    </body>
</html>
