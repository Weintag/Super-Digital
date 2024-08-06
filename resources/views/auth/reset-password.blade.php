<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
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
            <img class="h-10 text-green-600" src="{{asset('storage/img/logo/logo.png')}}" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd" />
            </svg>
        </a>
    </header>
    <main class="flex flex-col justify-center p-6 pb-12">
        <div class="mx-auto max-w-md">
            <svg class="mx-auto h-12 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <h2 class="mt-2 text-2xl font-bold text-gray-900 sm:mt-6 sm:text-3xl">Сбросить Пароль</h2>
        </div>
        <div class="mx-auto mt-6 w-full max-w-md rounded-xl bg-white/80 p-6 shadow-xl backdrop-blur-xl sm:mt-10 sm:p-10">
            <form action="{{ route('password.update') }}" method="post" autocomplete="off">
                @csrf

                <input type="hidden" name="token" value="{{ $request->token }}">

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="{{ $errors->has('email') ? 'text-red-400' : 'text-gray-400' }} h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus class="{{ $errors->has('email') ? 'text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 border-red-300' : 'border-gray-300 focus:border-green-500 focus:ring-green-500 placeholder:text-gray-400' }} w-full rounded-md pl-10 text-sm" placeholder="john@example.com" />
                        @error('email')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-red-500"  viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="{{ $errors->has('password') ? 'text-red-400' : 'text-gray-400' }} h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required class="{{ $errors->has('password') ? 'text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 border-red-300' : 'border-gray-300 focus:border-green-500 focus:ring-green-500 placeholder:text-gray-400' }} w-full rounded-md pl-10 text-sm" placeholder="Минимум 8 символов" />
                        @error('password')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтвердить пароль</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="{{ $errors->has('password_confirmation') ? 'text-red-400' : 'text-gray-400' }} h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="{{ $errors->has('password_confirmation') ? 'text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 border-red-300' : 'border-gray-300 focus:border-green-500 focus:ring-green-500 placeholder:text-gray-400' }} w-full rounded-md pl-10 text-sm" placeholder="Минимум 8 символов" />
                        @error('password_confirmation')
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"  clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="flex w-full items-center justify-center rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Сбросить пароль</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
