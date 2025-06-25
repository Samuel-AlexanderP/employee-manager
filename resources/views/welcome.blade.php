<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Employee Manager</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-4xl font-bold text-indigo-700 mb-2">Employee Management System</h1>
        <p class="text-gray-600 text-lg mb-6">Manage employee records, salaries, and analytics with ease.</p>

        <div class="flex flex-col sm:flex-row gap-4">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full shadow transition">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full shadow transition">
                    Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="bg-white border border-indigo-600 text-indigo-600 px-6 py-3 rounded-full shadow hover:bg-indigo-50 transition">
                        Register
                    </a>
                @endif
            @endauth
        </div>

        <div class="mt-10 text-sm text-gray-500">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>

</body>
</html>