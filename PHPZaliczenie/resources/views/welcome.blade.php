<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joke Collector</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    

    <script>
        window.isAuthenticated = @json(auth()->check());
        window.user = @json(auth()->user());
        window.logoutUrl = @json(route('logout'));
        window.loginUrl = @json(route('login'));
    </script>

    @if(auth()->check())
        <span>
            Zalogowany użytkownik: <b>{{ auth()->user()->username}}</b>
        </span>
        <form action="{{ route('logout')}}" method="post" class="absolute top-0 right-0 m-5">
            @csrf
            <div class="mb-6">
                <button type='submit' class="bg-orange-500 text-white rounded-lg py-2 px-4 hover:bg-orange-600 focus:outline-none focus:bg-orange-600">
                    Logout
                </button>
            </div>
        </form>
    @else
        <form action="{{ route('login') }}" method="get" class="absolute top-0 right-0 m-5">
            <div class="mb-6">
                <button type='submit' class="bg-green-500 text-white rounded-lg py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                    Login
                </button>
            </div>
        </form>
    @endif

    <div id="main" class="flex flex-col gap-10 items-center justify-center m-5"></div>
</body>

</html>