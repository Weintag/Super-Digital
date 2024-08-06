<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css'])
  <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
  <title>{{$title}}</title>
</head>
<style>
  .main-container68 {
    color: #070505;
    text-align: center;
    
    font-size: 32px;
    font-weight: 400;
    align-self: center;
    max-width: 458px;
    -webkit-text-stroke: 1px black;
    margin: 36px auto 36px;
  }
  h3{
   
   color: #070505;
   margin-left: 150px;
   margin-right: 150px;
 }
  .p2{
    
    color: #070505;
    margin-left: 150px;
    margin-right: 150px;
  }
  body{
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
  }
  </style>
  <body>
    @include('layouts.header')
    <div class="main-container68">О магазине</div>
    <p class="p2">Магазиг работает c 2024 года. Вы всегда можете обратиться руководство сайта по любым вопросам и предложениям.</p> 

    <p class="p2">Мы максимально открыты и рады всегда ответить на ваши вопросы! Электронная почта поддержки сайта - support@superdigital.ru</p>
    <p class="p2">Сайт работает для СНГ стран. Некоторые товары имеют региональные ограничения.</p>
    <p class="p2">Все продаваемые ключи закупаются у официальных дилеров, которые работают напрямую с издателями. 
В том числе с издателями: Atlus, Square Enix, 
Bandai Namco, Curve Digital, Capcom, Codemasters, 
Deep Silver, Disney, IO Interactive, Iceberg Interactive, 
Nordic Games, Paradox, Plug-in-Digital, Take-Two Interactive, 
Team17, Ubisoft, Бука, Новый Диск и другие!</p>
<p class="p2">Компания «Авиацифры» не перестает двигаться в ногу со временем. Наш интернет-магазин – тому подтверждение. Он создан для вашего удобства и призван помочь совершать покупки игр быстро, удобно и просто.</p>
<h3>Почему следует покупать у нас:</h3>
<p class="p2">• Еженедельные акции и распродажи.</p>
<p class="p2">• Мы ручаемся за качественный сервис, удобство обслуживания и всегда внимательны к своим пользователям.</p>
<p class="p2">Помните, что вы всегда можете купить в нашем магазине любимую игру со скидкой.</p>
<h3>О компании:</h3>
<p class="p2">ООО «СуперЦифровой»</p>
@vite([
            'resources/js/bootstrap.js',
            'resources/js/cart.js',  
          ])
          <script>
            $('#cartBox').hover(function(){
              $('#cartProducts').css('display', 'block');
            }, function () {
              $('#cartProducts').css('display', 'none');
            });

        </script>
    @include('layouts.footer')
  </body>
</html>