<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
</head>

<body>
    @include('layouts.header')
    @if (Auth::user()->admin)
        <style>
            .main-container456 {
                border-radius: 14px;
                background-color: #1c1b1b;
                display: flex;
                flex-direction: column;
                width: 100%;
                margin-top: 3%;
                margin-left: auto;
                margin-right: auto;
                max-width: 500px;
                padding: 2%;
            }

            @media (max-width: 991px) {
                .main-container456 {
                    max-width: 100%;
                    margin-top: 40px;
                    padding: 0 20px;
                }
            }

            .title456 {
                color: #fff;
                text-align: center;
                align-self: center;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .login456 {
                color: #fff;
                align-self: stretch;
                margin-top: 20px;
                white-space: nowrap;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            @media (max-width: 991px) {
                .login456 {
                    max-width: 100%;
                    white-space: initial;
                }
            }

            .status456 {
                color: #fff;
                align-self: stretch;
                margin-top: 26px;
                white-space: nowrap;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .admin {
                color: #fff;
                white-space: nowrap;
                border-radius: 14px;
                border-color: #000;
                align-self: flex-end;
                margin-top: 49px;
                margin-right: 50px;
                width: 200px;
                max-width: 100%;
                align-items: flex-start;
                padding: 14px 20px;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .obj {
                display: inline-flex;
            }

            @media (max-width: 991px) {
                .status456 {
                    max-width: 100%;
                    white-space: initial;
                }
            }

            .logout456 {
                color: #fff;
                white-space: nowrap;
                border-radius: 14px;
                border-color: #000;
                background-color: #F60018;
                align-self: flex-end;
                margin-top: 49px;
                margin-left: 50px;
                width: 115px;
                max-width: 100%;
                align-items: flex-start;
                padding: 14px 20px;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .logout456:hover {
                color: #1c1b1b;
            }

            @media (max-width: 991px) {
                .logout456 {
                    white-space: initial;
                    margin-top: 40px;
                    padding-left: 4px;
                }
            }
        </style>

        <div class="main-container456">
            <h2 class="title456">Общая информация</h2>
            <div class="login456">Имя пользователя: {{ auth()->user()->name }}</div>
            <div class="login456">Почта: {{ auth()->user()->email }}</div>
            <div class="login456">Подтверждение почты: {{ auth()->user()->email_verified_at }}</div>
            <div class="status456">Статус: Администратор</div>
            <div class="obj">
                <button class="admin"><a href="{{ route('render-admin') }}">Админ-панель</a></button>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="logout456">Выйти</button>
                </form>
            </div>
        </div>
    @endif

    @if (!Auth::user()->admin)
        <style>
            .blockinfouser {
                border-radius: 14px;
                background-color: #1c1b1b;
                display: flex;
                margin-top: 8%;
                margin-bottom: 5%;
                padding: 4%;
                flex-direction: column;
                justify-content: center;
            }

            .orders {
                border-radius: 14px;
                background-color: #1c1b1b;
                flex-grow: 1;
                margin-top: 2%;
                margin-left: 14%;
                margin-right: 5%;

            }

            .titl {
                font: 400 28px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
                -webkit-text-stroke: 1px black;
                padding-left: 18%;
                padding-top: 2%;
            }

            .main-container56 {
                border-radius: 14px;
                background-color: #1c1b1b;
                display: flex;
                flex-grow: 1;
                flex-direction: column;

                padding: 2%;
            }

            .obj {
                display: flex;
            }

            .title456 {
                color: #fff;
                text-align: center;
                align-self: center;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .login456 {
                color: #fff;
                margin-top: 3%;
                white-space: wrap;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            @media (max-width: 991px) {
                .login456 {
                    max-width: 100%;
                    white-space: initial;
                }
            }

            .status456 {
                color: #fff;
                align-self: stretch;
                margin-top: 26px;
                white-space: nowrap;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            @media (max-width: 991px) {
                .status456 {
                    max-width: 100%;
                    white-space: initial;
                }
            }

            .logout456 {
                color: #fff;
                white-space: nowrap;
                border-radius: 14px;
                padding: 17%;
                border-color: #000;
                background-color: #F60018;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .logout456:hover {
                color: #1c1b1b;
            }

            @media (max-width: 991px) {

                .obj {
                    display: flex;
                    flex-direction: column;
                }

            }

            .tabl {
                color: #fff;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .title56 {
                color: #fff;

                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            body {
                padding: 0;
                margin: 0;
            }

            .input {
                border-radius: 12px;
                background-color: #0D56A6;
                border-color: #000;
                color: #fff;
                display: flex;
                margin-top: 15px;
                margin-bottom: 15px;
                width: 100%;
                height: 38px;
                flex-direction: column;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            @media (max-width: 991px) {
                .input {
                    max-width: 100%;
                }
            }

            input::-webkit-input-placeholder {
                color: #fff;
                ;
            }

            .button56 {
                color: #000;
                border-radius: 14px;
                border: #000;
                background-color: #25D500;
                margin-top: 14px;
                margin-left: auto;
                margin-right: auto;
                align-items: center;
                padding: 9px 20px 9px;
                font: 400 20px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            }

            .button56:hover {
                color: #fff;
                background-color: #F60018;
            }



            .colta {
                font: 400 18px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
                height: 1%;
                padding: 2%;
                color: #fff;

            }

            .col {
                font: 400 18px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
                height: 4%;
                padding: 1%;
                color: #fff;

            }

            .colum {
                display: flex;
                flex-direction: column;
                padding-right: 5%;
            }

            .setting {
                font: 400 18px/25px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
                display: flex;
            }

            .imgset {
                width: 30px;
                display: flex;
            }

            .rowset {

                display: flex;
            }

            .rowset1 {
                padding-top: 5%;

                display: flex;
            }

            .exit {
                display: flex;
                padding-top: 5%;
                padding-bottom: 2%;



            }

            @media (max-width: 991px) {
                .button56 {
                    max-width: 100%;
                    margin-bottom: 30px;
                }

                .col {
                    font-size: 10px;
                    width: 5%;
                }
            }
        </style>
        <div class="titl">Мои заказы</div>
        <div class="obj">
            <div class="orders">
                <table>
                    <tr>
                        <th width="30%" class="colta">Название товара</th>
                        <th width="5%" class="colta">Количество</th>
                        <th width="5%" class="colta">Цена</th>
                        <th width="10%" class="colta">Дата покупки</th>

                    </tr>

                    @foreach ($orderproducts as $orderproduct)
                        @if ($orderproduct->order->status === 'Оплачен')
                            <tr>
                                <th class="col"><a
                                        href="{{ route('render-orderproduct', $orderproduct->id) }}">{{ $orderproduct->catalog->name }}</a>
                                </th>
                                <th class="col">{{ $orderproduct->quantity }}</th>
                                <th class="col">{{ $orderproduct->price }} ₽</th>
                                <th class="col">{{ $orderproduct->created_at }}</th>
                            </tr>
                        @endif
                    @endforeach

                </table>
                <div class="col-md-12">
                    {{ $orderproducts->links('vendor.pagination.simple-tailwind') }}
                </div>
            </div>



            <div class="colum">
                <div class="blockinfouser">
                    <div class="login456">Имя пользователя: {{ auth()->user()->name }}</div>
                    <div class="login456">Почта: {{ auth()->user()->email }}</div>
                    <div class="login456">Подтверждение почты: {{ auth()->user()->email_verified_at }}</div>
                    <div class="status456">Статус: Пользователь</div>
                </div>
                <div class="rowset">
                    <a href="{{ route('render-updateuse', auth()->user()->id) }}" class="setting">
                        <img src="{{ asset('storage/img/setting.svg') }}" class="imgset">Настройки</a>
                </div>
                <div class="rowset1">
                    <a href="{{ route('render-reviewsuser') }}" class="setting">
                        <img src="{{ asset('storage/img/review-screen.svg') }}" class="imgset">Отзывы</a>
                </div>
                <div class="exit">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="logout456">Выйти</button>
                    </form>
                </div>
                <div class="exit">
                    <span class="setting">Задать вопрос администрации интернет-магазина</span>
                </div>
                <div class="main-container56">
                    <h2 class="title56">Форма обратной связи</h2>
                    <form action="{{ route('insertMessage') }}" method="post">
                        @csrf
                        <input type="email" id="email" class="input" aria-label="Email" name="email"
                            placeholder="Введите почту" />
                        <input type="text" id="mess" class="input" aria-label="Text" name="message"
                            placeholder="Введите текст" />
                        <button type="submit" class="button56">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endif
    @include('layouts.footer')
    @vite(['resources/js/bootstrap.js', 'resources/js/cart.js'])
    <script>
        $('#cartBox').hover(function() {
            $('#cartProducts').css('display', 'block');
        }, function() {
            $('#cartProducts').css('display', 'none');
        });
    </script>
</body>

</html>
