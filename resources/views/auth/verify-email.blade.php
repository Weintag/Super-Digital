<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Защита</title>
</head>
<style>
    body{
        font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }
    </style>
<body class="min-h-screen bg-gray-50">
    <svg class="fixed bottom-0 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill-opacity="1"></path>
    </svg>
    <header class="flex items-center justify-between p-6">
        <a href="{{ route('render-home') }}" class="flex items-center gap-2">
            <img class="h-10 text-green-600" src="{{ asset('storage/img/logo/logo.png') }}" viewBox="0 0 24 24"
                fill="currentColor">
            <path fill-rule="evenodd" clip-rule="evenodd" />
            </img>
        </a>
        <div>
            <form method="post" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="rounded-md bg-gray-200 py-2 px-4 font-semibold text-gray-900 shadow-lg transition duration-150 ease-in-out hover:bg-gray-300 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Выйти</a>
            </form>
        </div>
    </header>
    <main class="flex flex-col justify-center p-6 pb-12">
        <div class="mx-auto max-w-md">
            <svg class="mx-auto h-12 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:mt-6 sm:text-3xl">Подтверждение почты</h2>
        </div>
        <div class="mx-auto max-w-md">
            <h1 class="mt-2 text-8xl font-bold text-gray-900 sm:mt-3 sm:text-2xl">Письмо для подтверждения почты было
                отправлено</h1>
        </div>
        <div
            class="mx-auto mt-6 w-full max-w-md rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
            <p class="mt-1 text-2xl text-gray-900 sm:mt-5 sm:text-1xl">Не пришло письмо?</p></br>
            @if (session('status'))
                <div class="flex gap-3 rounded-md border border-green-500 bg-green-50 p-4 mb-6">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="text-sm font-medium text-green-800">{{ session('status') }}</h3>
                </div>
            @endif
            <form action="{{ route('verification.send') }}" method="post" autocomplete="off">
                @csrf

                <div>
                    <button type="submit"
                        class="flex w-full items-center justify-center rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-blue-100 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-100y focus:ring-offset-2">Переотправить
                        ссылку на подтверждение почты</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
