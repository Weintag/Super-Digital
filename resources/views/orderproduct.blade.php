<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    @vite(['resources/css/app.css'])
    <title>{{ $title }}</title>
</head>
<style>
    body{ font-size: 18px;}
    .box {
        display: flex;
        justify-content: center;
        padding: 2.5%;
        margin-left: 14%;
        margin-right: 14%;
        border-radius: 14px;
        background-color: #d9d9d9;
      
    }
    .bix{
        font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
        color: #1b1b1b;
        background-color: #fff;
        padding: 3%;
        width: 100%;
        border-radius: 14px; 
    }
    .back{
        
    }
    .title {
        color: #070505;
        text-align: center;
        font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
        font-size: 32px;
        font-weight: 400;
        -webkit-text-stroke: 1px black;
        margin: 36px auto 16px;
    }
    .bixer{
        background-color: #d9d9d9;
        border-radius: 14px;
        padding: 2%; 
    }
    .introd{
        background-color: #0D56A6;
        color: #fff;
        padding: 1%;
        border-radius: 14px;
    }
    .introd:hover{
        background-color: #ffffff;
    }
    .te{
        color: #1b1b1b;
        -webkit-text-stroke: 1px #1b1b1b; /* Толщина и цвет обводки */
    }
    .te1{
        padding-left: 25px;
    }
    .tableorder123{
        margin-top: 2%;   
    }
</style>

<body>
    @include('layouts.header')
    <div class="title">Оплаченный товар</div>

    <div class="box">
        <div class="bix">
            <a href="{{route('render-userPage')}}" сlass="back">Вернуться к списку покупок</a><br>
            <br>
        @foreach ($orderproducts as $orderproduct)
        <div class="bixer">
          <div>  {{ $orderproduct->catalog->name }} </div>
          <div>  {{ $activationCode }} </div><br>
          @if($orderproduct->catalog->category == 'steam')
            <a href="{{route('render-steam-activation')}}" class="introd">Инструкция по использованию</a>
        @elseif($orderproduct->catalog->category == 'playstation')
        <a href="{{route('render-playstation-activation')}}" class="introd">Инструкция по использованию</a>
        @elseif($orderproduct->catalog->category == 'xbox')
        <a href="{{route('render-xbox-activation')}}" class="introd">Инструкция по использованию</a>
        @elseif($orderproduct->catalog->category == 'epicgames')
        <a href="{{route('render-epicgames-activation')}}" class="introd">Инструкция по использованию</a>
        @elseif($orderproduct->catalog->category == 'gog')
        <a href="{{route('render-gog-activation')}}" class="introd">Инструкция по использованию</a>
        @endif
        </div>
        <table class="tableorder123">
            <tr>
                <td class="te">Номер заказа №</td>
                <td class="te1">{{ $orderproduct->order_id }} (выписан: {{ $orderproduct->created_at }}) на сумму
                    {{ $orderproduct->price }} ₽</td>
            </tr>
            <tr>
                <td class="te">Состояние:</td>
                <td class="te1">Оплачен</td>
            </tr>
            <tr>
                <td class="te">Название товара:</td>
                <td class="te1">{{ $orderproduct->catalog->name }}</td>
            </tr>
        @endforeach
        </table>
        </div>
    </div>
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
