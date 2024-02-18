<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Joke Collector</title>
    @vite(['resources/css/app.css'])

</head>

<body class="antialiased flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-center font-extrabold text-3xl mb-6">Login</h1>

        @if (session('status'))
        <div class="text-red-500 mb-4">
            {{ session('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="text-red-500 mb-4">
            <strong>There were some problems with your input.</strong><br>
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
        @endif

        <form action="{{ route('login') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500 @error('email') border-red-500 @enderror">
                @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500 @error('password') border-red-500 @enderror">
                @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-orange-500 text-white rounded-lg py-2 px-4 hover:bg-orange-600 focus:outline-none focus:bg-orange-600">
                    Login
                </button>
            </div>
            <div class="text-center">
                <span>Don't have an account? </span>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
            </div>
        </form>
    </div>
</body>


</html>