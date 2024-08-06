<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    @vite(['resources/css/app.css'])
    @foreach ($catalogs as $catalog)
        <title>Купить {{ $catalog->name }}
            @if ($catalog->quantity >= 1)
                В наличии
            @elseif($catalog->quantity == 0)
                Нет в наличии
            @endif
        </title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .buy {
        color: #000;
        margin-left: 8%;
        font: 400 26px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    @media (max-width: 991px) {
        .buy {
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
        }
    }

    .t1,
    .t2,
    .t3 {
        color: #000;
        padding: 2%;
        font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica,
            sans-serif;
    }

    .t4 {
        color: #0D56A6;
        padding: 2%;
        font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica,
            sans-serif;
    }

    .t5 {

        color: #FF9A00;
        padding: 2%;
        font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica,
            sans-serif;
    }

    .t6 {
        color: #F60018;
        padding: 2%;
        font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica,
            sans-serif;
    }

    .chest {
        padding-left: 5%;
    }

    .colum {
        flex: 1;
        width: 100%;

    }

    .colum5 {
        padding-top: 2%;
        margin-left: 5%;
        flex-direction: column;
        text-align: center;
    }

    .image-wra2pper {
        background-color: #d9d9d9;
        border-radius: 14px; 
        object-position: center;
        object-fit: cover;
        padding: 1%;
        margin-top: 1%;
        overflow: hidden;
    }

    .obj {
        display: inline-flex;
        padding-left: 3.6%;
        padding-right: 3.6%;
    }

    @media (max-width: 991px) {
        .image-wra2pper {
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            margin-top: auto;
        }

        .obj {
            flex-direction: column;
        }

        .colum5 {
            margin-left: auto;
            margin-right: auto;
        }

    }

    .price {
        color: #000;
        justify-content: center;

        font: 400 48px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    .pric1 {
        padding-bottom: 5%;
        text-decoration: line-through;
        color: #000;
        white-space: nowrap;
        font: 400 24px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    @media (max-width: 991px) {
        .price {
            margin-left: auto;
            margin-right: auto;
            font-size: 40px;
            white-space: initial;
        }
    }

    .activation-header {

        color: #000;
        flex-grow: 1;
        white-space: nowrap;
        font: 400 18px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    @media (max-width: 991px) {
        .activation-header {
            margin-left: auto;
            margin-right: auto;
            white-space: initial;
        }
    }

    .activation-head {

        color: #000;
        flex-grow: 1;
        white-space: nowrap;
        font: 400 18px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    @media (max-width: 991px) {
        .activation-head {
            margin-left: auto;
            margin-right: auto;
            white-space: initial;
        }
    }

    .activation-heade {
        color: #000;
        flex-grow: 1;
        white-space: nowrap;
        font: 400 18px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    .corz {
        margin-top: 5%;
        padding: 4%;
        justify-content: center;
        align-items: center;
        width: 250px;
        border: #000;
        border-radius: 14px;
        font-size: 24px;
        font: 400 18px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        background-color: #25D500;
    }
    .corz:hover{
        background-color: #F60018;
        color: #fff;
    }
    .rowad {
        display: flex;
        padding-top: 2%;
        margin-left: 30px;
        width: 45%;

    }

    .rowad1 {
        background-color: #1b1b1b;
        border-radius: 14px;
        font: 16px Encode Sans Condensed, -apple-system, Roboto, Helvetica,
            sans-serif;
        color: #fff;
        display: flex;
        margin-top: 3%;
        padding: 1%;
        margin-left: 5.5%;
        width: 35.5%;

    }

    @media (max-width: 991px) {
        .activation-heade {
            margin-left: auto;
            margin-right: auto;
            white-space: initial;

        }

        .corz {
            margin-left: auto;
            margin-right: auto;
        }

        .corz1 {
            margin-left: auto;
            margin-right: auto;
        }

        .rowad {
            width: 90%;
        }

        .order {
            margin-left: auto;
            margin-right: auto;
        }
    }

    .box-modal {
        position: fixed;
        top: 0;
        display: none;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.548);
        width: 100vw;
        height: 100vh;
        z-index: 100;
    }

    .box-modal .modal {
        display: flex;
        flex-direction: column;
        gap: .5rem;
        width: 50%;
        background: white;
        border-radius: 14px;
        padding: 1%;
    }

    .box-modal .modal .modal-exit {
        display: flex;
        justify-content: end;
    }

    .box-modal .modal .modal-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
        padding-right: .5rem;
    }

    .box-modal .modal span {
        font-size: medium;
        font-family: "Encode Sans Condensed-Regular", Helvetica;
        font-weight: 400;
        font-size: 20px;
        display: flex;
        flex-wrap: wrap;
    }

    .box-modal .modal .modal-button {
        display: flex;
        gap: 2rem;
    }

    .box-modal .modal .modal-button .button-back {
        display: flex;
        justify-content: center;
        font-family: "Encode Sans Condensed-Regular", Helvetica;
        align-items: center;
        width: 250px;
        padding: 4%;
        font-size: 18px;
        height: 30px;
        border: 2px solid black;
        border-radius: 14px;
    }

    .box-modal .modal .modal-button .button-cart {
        font-family: "Encode Sans Condensed-Regular", Helvetica;
        font-size: 18px;
        width: 250px;
        height: 30px;
        padding: 4%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #0D56A6;
        color: #fff;
        border: 2px solid black;
        border-radius: 14px;
    }

    .catline {
        font: 400 16px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        padding: 1%;
        margin-top: 1%;
        margin-left: 7%;
    }

    .block {
        background-color: #d9d9d9;
        border-radius: 14px;
        justify-content: center;
        padding: 2%;
        margin-top: 2%;
        margin-left: 5%;
        margin-right: 5%;
    }

    .whiteblock {
        background-color: #fff;
        border-radius: 14px;
        padding: 1%;
        margin: 2%;
    }

    a .openCart:hover {
        color: none;
    }
</style>

<body>
    @include('layouts.header')
    <div class="block">
        <div class="whiteblock">
            <div class="catline">
                <a href="{{ route('render-home') }}"><span>Главная</span></a>
                <span>></span>
                @if ($catalog->category == 'steam')
                    <a href="{{ route('render-steam') }}"><span>Каталог</span></a>
                @elseif($catalog->category == 'playstation')
                    <a href="{{ route('render-playstation') }}"><span>Каталог</span></a>
                @elseif($catalog->category == 'xbox')
                    <a href="{{ route('render-xbox') }}"><span>Каталог</span></a>
                @elseif($catalog->category == 'gog')
                    <a href="{{ route('render-gog') }}"><span>Каталог</span></a>
                @elseif($catalog->category == 'epicgames')
                    <a href="{{ route('render-epicgames') }}"><span>Каталог</span></a>
                @endif
                <span>></span>
                <span>{{ $catalog->name }}</span>
            </div>
            <div class="buy">Купить {{ $catalog->name }}</div>
            <div class="obj">
                <img srcset="{{ asset('storage/catalog/' . $catalog->image) }}" class="image-wra2pper" width="800px"
                    height="500x" />

                <div class="rowad">
                    <div class="colum">
                        <p class="t1">Регион активации:</p>
                        <p class="t1">Тип:</p>
                        <p class="t1">Наличие товара:</p>
                    </div>
                    <div class="colum">
                        <p class="t2">Россия, страны СНГ</p>
                        <p class="t2">{{ $catalog->type }}</p>
                        @if ($catalog->quantity >= 60)
                            <p class="t4">много</p>
                        @elseif($catalog->quantity >= 30)
                            <p class="t5">достаточно</p>
                        @elseif($catalog->quantity >= 1)
                            <p class="t6">мало</p>
                        @elseif($catalog->quantity == 0)
                            <p class="t2">нет в наличии</p>
                        @endif
                    </div>
                </div>

                <div class="colum5">
                    @if ($catalog->sale == '0')
                        <span class="price">{{ $catalog->price }} ₽</span>
                    @else
                        <span class="price">{{ $catalog->pricesale }} ₽</span>
                        <span class="pric1">{{ $catalog->price }} ₽</span>
                    @endif
                    <div class="row">
                        <span class="activation-header">Активация:</span>
                        <span class="activation-head">{{ $catalog->category }}</span>
                    </div>
                    <span class="activation-heade">Мгновенная доставка</span>
                    @auth
                        <form action="" method="post" id="formCart">
                            <button class="corz addCart" type="button" data-id="{{ $catalog->id }}"><span>Добавить в
                                    корзину</span></button>
                        </form>
                    @endauth
                    @guest
                        <a href="#cart" class="openCart">
                            <button class="corz"><span>Добавить в корзину</span></button>
                        </a>
                    @endguest
                </div>
            </div>

            <div class="rowad1">
                <div class="colum">
                    <p>Дата выхода игры:</p>
                    <p>Издатель:</p>
                    <p>Разработчик:</p>
                    <p>Совместимые платформы:</p>
                    <p>Жанры</p>
                </div>
                <div class="colum">
                    <p>{{ $catalog->date }}</p>
                    <p>{{ $catalog->publisher }}</p>
                    <p>{{ $catalog->developer }}</p>
                    <p>{{ $catalog->platforms }}</p>
                    <p>{{ $catalog->genre }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @vite(['resources/js/bootstrap.js', 'resources/js/cart.js'])
    @include('layouts.footer')
    <div class="box-modal" id="modalCart">
        <div class="modal">
            <div class="modal-exit">
                <span class="modalClose">X</span>
            </div>
            <div class="modal-content">
                <span>Товар успешно добавлен в корзину</span>
                <div class="modal-button">
                    <button class="button-back modalClose" type="button">Продолжить покупки</button>
                    <a class="button-cart modalClose" id="openCart" href="#cart">Перейти в корзину</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#cartBox').hover(function() {
            $('#cartProducts').css('display', 'block');
        }, function() {
            $('#cartProducts').css('display', 'none');
        });
    </script>
</body>

</html>
