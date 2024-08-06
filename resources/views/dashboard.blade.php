<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    @vite(['resources/css/app.css'])
    <title>Защита</title>
</head>
<style>
    body{
        font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }
    </style>
<body class="min-h-screen bg-gray-50">
    <svg class="fixed bottom-0 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill-opacity="1" ></path>
    </svg>
    <header class="flex items-center justify-between p-6">
        <a href="{{ route('render-home') }}" class="flex items-center gap-2">
            <img class="h-10 text-green-600" src="{{asset('storage/img/logo/logo.png')}}" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"  clip-rule="evenodd" />
        </img>
        </a>
        <div class="flex gap-2">
            <a href="{{ route('render-userPage') }}" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-100 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-100 focus:ring-offset-2">Личный кабинет</a>
            <form method="post" action="{{ route('logout') }}" class="flex">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="rounded-md bg-gray-200 py-2 px-4 font-semibold text-gray-900 shadow-lg transition duration-150 ease-in-out hover:bg-gray-300 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Выйти</a>
            </form>
        </div>
    </header>
    <main>
        <div class="m-6 mb-12 rounded-xl p-6 shadow-xl sm:p-10">
            <h1 class="text-3xl">Почта была успешно подтверждена!</h1>
        </div>
    </main>
</body>

</html>
