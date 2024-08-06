<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css'])
  <title>{{$title}}</title>
  <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
</head>
<style>
  body{
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
  }
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
  .p1{
  
    color: #070505;
    margin-left: 150px;
  }
  @media (max-width: 991px){
    h3,p{
    margin-left: auto;
    }
    .p1{
      margin-left: 30px;
    }
  }
  </style>
  <body>
    @include('layouts.header')
    <div class="main-container68">Партнерcкая программа</div>
    <h3>Что это такое</h3>
    <p class="p2">Участвуйте в партнерской программе Супер Цифровой!</p>
    <p class="p2">Сотрудничая с партнерской программой вместе с Супер Цифровой, вы будете получать вознаграждение от стоимости каждой совершенной покупки на нашем сайте покупателей, пришедших по вашей партнерской ссылке.</p>
    <h3>Как распространить ссылку</h3>
    <p class="p2">Индивидуальную ссылку можно размещать там, где Вам это удобно. На вашем сайте, страницах социальных сетей, форумах и в своих роликах на YouTube.</p>
    <p class="p1">• Зарегистрируйтесь на сайте.</p>
    <p class="p1">• Обратитесь к администрации сайта о желании о сотрудничестве.</p>
    <p class="p1">• Получите партнерскую ссылку.</p>
    <p class="p1">• Разместите партнерскую ссылку на сайт или на конкретный товар на своей площадке.</p>
    <p class="p1">• Отслеживайте статистику по своим рекламным активностям.</p>
    <p class="p1">• Получайте вознаграждение даже если покупатель приобрел не тот товар, который рекламировался, но перешел по вашей партнерской ссылке.</p>
    <h3>Начальные позиций</h3>
    <p class="p2">В нашем каталоге со временем будет больше наименований и каждый месяц количество товаров станет пополнятся. Человек, перешедший по ссылке, обязательно найдет товар для себя :)</p>
    @include('layouts.footer')
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
  </body>
  
</html>