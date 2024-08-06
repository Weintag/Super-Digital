<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css'])
    <title>{{$title}}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
</head>
<style>
  body{
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
  }
  a{
    text-decoration: none;
    color: #0D56A6;
  }
  a:hover{
    color: #F60018;
  }
     .main-container68 {
    color: #070505;
    text-align: center;
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 32px;
    font-weight: 400;
    align-self: center;
    max-width: 458px;
    -webkit-text-stroke: 1px black;
    margin: 2% auto 1%;
  }
  .for{
    margin-top: -50px;
    margin-left: auto;
    margin-right: auto;
  }
    .text-wrapper-13 {
      color: #1c1b1b;
      font-size: 16px;
      white-space: nowrap;
      display: flex;
      margin: 10px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
    }
    .inp {
      border-radius: 12px;
      border: #000;
      background-color: #0D56A6;
      color: #ffffff;
      align-self: stretch;
      display: flex;
      width: 80%;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      height: 38px;
      font-size: 16px;
      display: flex;
      font-family: "Encode Sans Condensed", Helvetica;
      color: #ffffff;
      line-height: normal;
      white-space: nowrap;

    }
    .inpa {
      border-radius: 12px;
      border: #000;
      background-color: #0D56A6;
      color: #ffffff;
      display: flex;
      width: 90%;
      margin-top: 10px;
      margin-bottom: 10px;
      min-height: 50px;
      min-width: 550px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      height: 100px;
      font-size: 16px;
      
    }
    .inpa::placeholder{
        font-family: "Encode Sans Condensed", Helvetica;
      color: #ffffff;
    }
    .categ {
    margin-left: 10px;
      margin-right: 10px;
      border-radius: 12px;
      border: #000;
      background-color: #0D56A6;
      color: #ffffff;
      height: 38px;
    }
    .overlap-5 {
      display: flex;
      text-align: center;
      height: 42px;
      background-color: #25D500;
      border-radius: 14px;
      border: #000000;
    }
    .overlap-5:hover {
      background-color: #F60018;
    }
    .text-wrapper666 {
      font-size: 20px;
      background-color: #1c1b1b;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }
    .overlap-10 {
      display: flex;
      width: auto;
      height: 64px;
      background-color: #1c1b1b;
      border-radius: 14px;
      flex-wrap: wrap;
    }
    @media (max-width: 991px) {
      .group {
        margin-left: auto;
      }
      .rectangle{
        margin-left: auto;
        margin-right: auto;
        max-width: 90%;
      }

      .overlap-10 {
        height: auto;
        flex-wrap: wrap;
        flex-direction: column;
      }
      .text-wrapper-17 {
        margin-left: auto;
        margin-right: auto;
      }
    }
    .main-container68 {
    color: #070505;
    text-align: center;
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 32px;
    font-weight: 400;
    align-self: center;
    max-width: 458px;
    -webkit-text-stroke: 1px black;
    margin: 36px auto 16px;
  }
  .warn{
  color: #000; 
  margin-left: auto;
  margin-right: auto;
  text-align: center; 
  align-self: center; 
  margin-top: 33px; 
  max-width: 969px; 
  font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; 
} 
@media (max-width: 991px) 
{ .warn{ 
  max-width: 100%; 
} 
}
.main-cont125 {
    border-radius: 14px;
    background-color: #1c1b1b;
    display: flex;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    width: 526px;
    max-width: 100%;
    flex-direction: column;
    align-items: center;
    padding: 16px 0;
  }
  
  @media (max-width: 991px) {
    .main-cont125 {
      margin-top: 40px;
    }
  }
  
  .title125 {
    color: #fff;
    text-align: center;
    width: 299px;
    font-size: 20px;
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
  }
  
  .div-125 {
    align-self: stretch;
    display: flex;
    margin-top: 16px;
    flex-direction: column;
    align-items: center;
    padding: 0 32px;
  }
  
  @media (max-width: 991px) {
    .div-125 {
      max-width: 100%;
      padding: 0 20px;
    }
  }
  
  .div-126 {
    border: #000;
    border-radius: 14px;
    background-color: #d9d9d9;
    align-self: stretch;
    display: flex;
    height: 45px;
    flex-direction: column;
  }
  
  @media (max-width: 991px) {
    .div-126 {
      max-width: 100%;
    }
  }
  
  .div-127 {
    align-self: stretch;
    display: flex;
    margin-top: 14px;
    width: 100%;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
  }
  
  @media (max-width: 991px) {
    .div-127 {
      max-width: 100%;
      flex-wrap: wrap;
    }
  }
  
  .div-128 {
    color: #fff;
    text-align: center;
    flex-grow: 1;
    flex-basis: auto;
    margin: auto 0;
    font-size: 14px;
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
  }
  
  .div-129 {
    align-self: stretch;
    display: flex;
    padding-right: 66px;
    justify-content: space-between;
    gap: 5px;
  }
  .positive{
    margin-top: 7px;
  }
  .negative{
    margin-top: 7px;
  }
  @media (max-width: 991px) {
    .div-129 {
      padding-right: 20px;
    }
  }
  
  .img125 {
    aspect-ratio: 1;
    object-fit: contain;
    object-position: center;
    width: 30px;
    overflow: hidden;
    max-width: 100%;
  }
  
  .div-130 {
    color: #000;
    border: #000;
    white-space: nowrap;
    border-radius: 14px;
    background-color: #25D500;
    margin-top: 9px;
    padding: 9px 31px 9px;
    font-size: 20px;
    font-family: 'Encode Sans Condensed', -apple-system, Roboto, Helvetica, sans-serif;
  }
  .div-130:hover{
    color: #fff;
    background-color: #F60018;
  }
  @media (max-width: 991px) {
    .div-130 {
      white-space: initial;
      padding: 0 20px;
    }
  }
  .group {
      display: flex;
      margin-top: 50px;
      padding-bottom: 50px;
      margin-left: 100px;
      margin-right: 100px;
      background-color: #d9d9d9;
      border-radius: 14px;
      flex-direction: column;
    }
    .overlap-10 {
      display: flex;
      width: auto;
      height: 64px;
      background-color: #1c1b1b;
      border-radius: 14px;
      flex-wrap: wrap;
    }
    .text-wrapper-17 {
      color: #ffffff;
      font-size: 20px;
      margin-top: 15px;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 10px;
      display: flex;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
    }
    @media(max-width:1500px){
    .text-wrapper-17{
      margin-left: auto;
      margin-right: auto;
    }
  }
    .rectangle {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
      margin-left: 80px;
      width: 700px;
      top: 0;
      background-color: #ffffff;
      border-radius: 30px;
    }

    @media (max-width: 991px) {
      .group {
        margin-left: auto;
      }
      .rectangle{
        margin-left: auto;
        margin-right: auto;
        max-width: 90%;
      }

      .overlap-10 {
        height: auto;
        flex-wrap: wrap;
        flex-direction: column;
      }
      .text-wrapper-17 {
        margin-left: auto;
        margin-right: auto;
      }
    }
    .rev125{
      padding-top: 15px;
      display: flex;
      margin-left: 150px;
      gap: 20px;
    }
    .main-container444 {
      border-radius: 30px;
      background-color: #fff;
      display: flex;
      flex-grow: 1;
      flex-direction: column;
      padding: 18px 80px 11px 36px;
    }

    @media (max-width: 991px) {
      .main-container444 {
        max-width: 100%;
        margin-top: 40px;
        padding: 0 20px;
      }
    }

    .header444 {
      color: #000;
      text-align: center;
      align-self: start;
      white-space: nowrap;
      font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    @media (max-width: 991px) {
      .header444 {
        margin-left: 10px;
        white-space: initial;
      }
    }

    .description444 {
      color: #000;
      margin-top: 20px;
      font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    @media (max-width: 991px) {
      .description444 {
        max-width: 100%;
        flex-wrap: wrap;
        margin-right: 6px;
        word-break: break-all;
      }
    }

    .image-container444 {
      align-self: start;
      display: flex;
      margin-top: 15px;
      justify-content: space-between;
      gap: 20px;
    }

    .img444 {
      aspect-ratio: 0.92;
      object-fit: contain;
      object-position: center;
      width: 35px;
      overflow: hidden;
      max-width: 100%;
    }

    .date444 {
      color: #000;
      text-align: center;
      align-self: center;
      margin: auto0;
      font: 400 20px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }
    .obj3{
      display: flex;
      flex-wrap: wrap;
    }
    .row{
      display: flex;
      justify-content: center;
    }
    @media(max-width: 991px){
      .row{
        flex-direction: column;
      }
    }
   
</style>
<body>
  @include('layouts.header')
    <h2 class="main-container68">Отзывы пользователя</h2><div class="group">
      <div class="overlap-10">
       <div class="text-wrapper-17">Отзывы написанные вами о работе интернет-магазина</div>
      </div>
      <div class="obj3">
   @foreach($reviews as $review)
      <div class="rectangle">
      <div class="main-container444">
      <div class="header444">{{$review->user->name ?? 'None'}}</div>
      <div class="description444">{{$review->review}}</div>
      <div class="image-container444">
        @if($review->type == 'Положительный')
        <img src="{{asset('storage/img/bxs_smile.svg')}}" class="img444" />
        @else
        <img src="{{asset('storage/img/ph_smiley-sad-fill.svg')}}" class="img444" />
        @endif
        <div class="date444">{{$review->created_at}}</div>
        <a href="{{route('render-updaterev', $review->id)}}"><img src="{{asset ('storage/img//admin//material-symbols_ink-pen.svg')}}"></a>
      </div>
    </div>
      </div>
     @endforeach
    </div>
    </div>
    <div class="row">
      <p class="hor">Передумали просматривать свои отзывы? <a href="{{route('render-userPage')}}">Вернуться</a></p>
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
