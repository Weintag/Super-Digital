<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
  @vite(['resources/css/app.css'])
  <title>{{$title}}</title>
</head>
<style>
.main-cont {
    color: #070505;
    text-align: center;
    font-family:  'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 32px;
    font-weight: 400;
    align-self: center;
    max-width: 458px;
    -webkit-text-stroke: 1px black;
    margin: 36px auto 16px;
  }
  .obj1{
    flex-direction: column;
  }
  .obj2{
    display: inline-flex;
  }
  .main-container__item{
    display: flex;
    margin-top: 20px;
    margin-left: 50px;
  }
  .main-container__img {
    aspect-ratio: 1;
    object-fit: contain;
    object-position: center;
    margin-left: 10px;
    margin-right: 10px;
    align-self: start;
    max-width: 100%;
  }

  .main-container__content {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
  }

  .main-container__title {
    color: #000;
    max-width: 258px;
    font: 700 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
  }

  .main-container__description {
    color: #000;
    margin-top: 27px;
    max-width: 320px;
    font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
  }
  @media (max-width: 991px) {
    .obj2{
      flex-wrap: wrap;
    }
  }
  </style>
  <body>
    
    @include('layouts.header')
    
    <div class="main-cont">Гарантии</div>
    <div class="obj1">
  <div class="obj2">
    <div class="main-container__item">
        <img loading="lazy" src="{{asset('storage/img/ph_key-fill.svg')}}" class="main-container__img" />
      <div class="main-container__content">
        <div class="main-container__title">Официальные ключи</div>
        <div class="main-container__description">Все цифровые копии товаров закупаются у официальных дистрибютеров, которые сотрудничают напрямую с издателями.</div>
      </div>
    </div>
    <div class="main-container__item">
      <img loading="lazy" src="{{asset('storage/img/game-icons_handheld-fan.svg')}}" class="main-container__img" />
      <div class="main-container__content">
        <div class="main-container__title">Большой выбор</div>
        <div class="main-container__description">Ассортимент сайта позволит вам приобрести большой спектр видеоигр на различные платформы и лаунчеры.</div>
      </div>
    </div>
   
    <div class="main-container__item">
      <img loading="lazy" src="{{asset('storage/img/mdi_sale125.svg')}}" class="main-container__img" />
      <div class="main-container__content">
        <div class="main-container__title">Акции и скидки</div>
        <div class="main-container__description">На сайте постоянно проводятся акции на различные товары и проходят массовые распродажи, где можно обнаружить желаемый товар с хорошей скидкой.</div>
      </div>
    </div>
    <div class="main-container__item">
        <img loading="lazy" src="{{asset('storage/img/material-symbols_reviews.svg')}}" class="main-container__img" />
        <div class="main-container__content">
          <div class="main-container__title">Отзывы</div>
          <div class="main-container__description">Каждый пользователь может оставить отзыв о работе сайте.</div>
        </div>
      </div>
    </div>
    <div class="obj2">
    <div class="main-container__item">
      <img loading="lazy" src="{{asset('storage/img/mdi_support.svg')}}" class="main-container__img" />
      <div class="main-container__content">
        <div class="main-container__title">Поддержка</div>
        <div class="main-container__description">На сайте действует активная поддержка пользователей по вопросам покупки товаров.</div>
      </div>
    </div>
    <div class="main-container__item">
      <img loading="lazy" src="{{asset('storage/img/carbon_delivery-parcel.svg')}}" class="main-container__img" />
      <div class="main-container__content">
        <div class="main-container__title">Моментальная доставка</div>
        <div class="main-container__description">После оплаты сразу получите товар.</div>
      </div>
    </div>
    <div class="main-container__item">
      <img loading="lazy" src="{{asset('storage/img/bi_wrench-adjustable.svg')}}" class="main-container__img" />
      <div class="main-container__content">
        <div class="main-container__title">Стабильность и надежность</div>
        <div class="main-container__description">Сайт предоставляет стабильную, надежную и качественную работу для удобной, оперативной приобретения товара.</div>
      </div>
    </div>
    
    </div>
    </div>
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