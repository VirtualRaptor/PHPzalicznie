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
        <h1 class="text-center font-extrabold text-3xl mb-6">Register</h1>

        <form action="{{ route('register')}}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block">Username</label>
                <input type='text' name='username' id='username' value="{{ old('username') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500 @error('username') border-red-500 @enderror">
                @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block">Email</label>
                <input type='text' name='email' id='email' value="{{ old('email') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500 @error('email') border-red-500 @enderror">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="block">Password</label>
                <input type='password' name='password' id='password' class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500 @error('password') border-red-500 @enderror">
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block">Repeat Password</label>
                <input type='password' name='password_confirmation' id='password_confirmation' class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500 @error('password_confirmation') border-red-500 @enderror">
                @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type='submit' class="w-full bg-orange-500 text-white rounded-lg py-2 px-4 hover:bg-orange-600 focus:outline-none focus:bg-orange-600">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>

</html>