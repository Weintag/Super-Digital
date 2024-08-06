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

        body {
            margin: 0;
            padding: 0;
        }

        .gt1 {
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

    body {
        overflow-x: hidden;
    }

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

    .number {
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
                    <img src="{{ asset('storage/img/xbox.svg') }}" width="70px">
                    <div class="columnth">
                        <p class="textsteam">Xbox – это домашняя игровая консоль, разработанная и выпущенная
                            американской корпорацией Microsoft, первая в одноимённой серии игровых приставок Xbox</p>
                    </div>
                </div>

                <hr>
                <div>
                    <div class="number">Активация кода на Xbox Series X|S и Xbox One</div>
                    <div class="rowht">
                        <div class="number">1</div><span>Нажмите кнопку <b>Xbox</b>, чтобы открыть гид, а затем выберите
                            <b>Store.</b></span>
                    </div>
                    <div class="rowht">
                        <div class="number">2</div>
                        <div>Нажмите кнопку <b>Просмотр</b>, чтобы открыть боковое меню, а затем выберите
                            <b>Активировать.</b>
                        </div>
                    </div>
                    <div class="rowht">
                        <div class="number">3</div>
                        <div>Введите 25-значный код, нажмите <b>Далее</b> и следуйте указаниям на экране.</div>
                    </div>
                    <div class="number">Активация кода на компьютере или в мобильном веб-браузере</div>
                    <p>Перейдите по приведенной ниже ссылке, введите 25-значный код, нажмите Далее и следуйте указаниям
                        на экране.
                </div>
                <a href="https://redeem.microsoft.com/">
                    <div>Активируйте свой код или карту оплаты</div>
                </a><br>
                <div class="number">Активация кода в Microsoft Store для Windows</div>
                <div class="rowht">
                    <div class="number">1</div>
                    <div>Нажмите кнопку <b>Пуск</b> и введите <b>store</b> в строке поиска.</div>
                </div>

                <div class="rowht">
                    <div class="number">2</div>
                    <div>Выберите <b>Microsoft Store</b> в результатах, чтобы открыть приложение.</div>
                </div>

                <div class="rowht">
                    <div class="number">3</div>
                    <div>Выберите свою учетную запись в правом верхнем углу экрана и нажмите <b>Активировать код или подарочные карты.</b></div>
                </div>

                <div class="rowht">
                    <div class="number">4</div>
                    <div>Введите 25-значный код, нажмите <b>Далее</b> и следуйте указаниям на экране.</div>
                </div>
                <div class="number">Активация кода на Xbox 360</div>
                <div class="rowht">
                    <div class="number">1</div>
                    <div>Нажмите кнопку <b>Гид</b> на геймпаде.</div>
                </div><br>
                <div class="rowht">
                    <div class="number">2</div>
                    <div>Выберите <b>Игры</b> и приложения и нажмите <b>Активировать код.</b></div>
                </div>
                <div class="rowht">
                    <div class="number">3</div>
                    <div>Введите 25-значный код и следуйте указаниям на экране, чтобы завершить активацию.</div>
                </div>
                <a href="{{ route('render-userPage') }}" class="mysale">
                    <div class="mysale1">Мои покупки</div>
                </a>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
