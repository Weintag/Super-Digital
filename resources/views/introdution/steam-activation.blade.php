<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    <title>{{ $title }}</title>
</head>
<style>
    a {
        text-decoration: none;
        color: #0D56A6;
    }

    a:hover {
        color: #f60018;
    }

    .logotip {
        margin-top: 2%;
        margin-bottom: 2%;
        display: flex;
        justify-content: center;
        object-position: center;
        object-fit: cover;

    }

    .blockbox {
        background-color: #d9d9d9;
        border-radius: 14px;
        flex-direction: column;
        width: 100%;
        max-width: 900px;
        margin: auto;
        margin-bottom: 2%;
        padding: 1%;


    }
    .gt1 {
        font: 400 26px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        display: flex;
        font-weight: bold;
        margin-left: 27%;
        margin-bottom: 1%;

    }

    @media(max-width: 991px) {
        .blockbox {
            margin: 1%;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .gt1{
            font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
            font-weight: bold;
            display: block;
            margin: 0;
            text-align: center;
        }
    }

    

    .whitetheme {
        background-color: #fff;
        border-radius: 14px;
        font: 16px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        padding: 1%;
        margin: 1%;
    }

    .whitetheme1 {
        background-color: #FF9A00;
        border-radius: 14px;
        font: 16px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        display: flex;
        justify-content: center;
        padding: 1%;
        margin: 1%;
    }

    .textsteam {
        margin-left: 2%;

    }
    body { overflow-x:hidden; }
    .columnth {
        flex-direction: column;
    }

    .rowht {
        display: inline-flex;
        align-items: center;
        padding: 1%;
    }

    .mysale {
        color: #fff;
    }

    .mysale1 {
        background-color: #0D56A6;
        border-radius: 14px;
        max-width: 15%;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 3%;
        padding: 1%;
        text-align: center;
        color: #fff;
    }

    .mysale:hover {
        color: #fff;
    }

    .imght {

        max-width: 450px;
        width: 100%;
    }

    .just {
        display: flex;
        justify-content: center;
    }
    .number{
        color: #fff;
        background-color: #1b1b1b;
        padding: 10px;
        border-radius: 14px;
        margin-right: 10px;
    }
</style>

<body>
    <div class="logotip">
        <img src="{{ asset('storage/img/logo/logo.png') }}" width="300px">
    </div>
    <div class="gt1">
        Инструкция
    </div>
    <div class="blockbox">
        <div class="whitetheme">

            <div class="columnth">
                <div class="rowht">
                    <img src="{{ asset('storage/img/steam.svg') }}" width="70px">
                    <div class="columnth">
                        <p class="textsteam">Steam – это многофункциональный сервис от компании Valve, им пользуется
                            более 75
                            млн пользователей по всему миру.</p>
                        <p class="textsteam">Установить для <a
                                href="https://steamcdn-a.akamaihd.net/client/installer/SteamSetup.exe">Windows</a>,
                            также
                            доступен для <a href="https://steamcdn-a.akamaihd.net/client/installer/steam.dmg">Mac</a> и
                            <a href="https://steamcdn-a.akamaihd.net/client/installer/steam.deb">Linux</a></p>
                    </div>
                </div>

                <hr>
                <div>
                    <div class="rowht">
                    <div class="number">1</div><span>Вам необходимо скачать клиент Steam с официального сайта (ссылка выше) и установить.</span>
                    </div>
                    <div class="rowht">
                        <div class="number">2</div> <div>В следующем окне вам будет предложено ввести логин и пароль, либо создать новую учетную запись</div>
                        </div>
                        <div class="rowht">
                            <div class="number">3</div> <div>В меню «Игры» выбирайте пункт «Активировать через Steam». В открывшееся окошке вводите полученный код.</div>
                            </div>
                    <div class="just">
                        <img src="{{ asset('storage/img/steam-key.png') }}" class="imght"></img>
                    </div>
                    <div class="rowht">
                        <div class="number">4</div> <div>Если Вы купили в нашем интернет-магазине, то ключ активации доступен в личном кабинете</div>
                        </div>
                    <a href="{{ route('render-userPage') }}" class="mysale">
                        <div class="mysale1">Мои покупки</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="whitetheme1">
            <b>Ключ также можно активировать <a href="https://steampay.com/key-activate"> через браузер</a></b>
        </div>
    </div>
    </div>
</body>

</html>
