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
    margin: 36px auto 16px;
    margin-bottom: 0px;
  }
  .for{
    margin-left: auto;
    margin-right: auto;
  }
  .hor{
    align-self: center;
  }
    .inp {
      border-radius: 12px;
      border: #000;
      background-color: #0D56A6;
      color: #ffffff;
      align-self: stretch;
      display: flex;
      width: 80%;
      margin-top: 5%;
      margin-bottom: 5%;
      margin-left: auto;
      margin-right: auto;
      padding-left: 2%;
      height: 38px;
      font-size: 16px;
      display: flex;
      font-family: "Encode Sans Condensed", Helvetica;
      color: #ffffff;
      line-height: normal;
      white-space: nowrap;

    }
    .inp::placeholder{
      color: #ffffff;
      font-family: "Encode Sans Condensed", Helvetica;
    }

    .overlap-5 {
      display: flex;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      width: 80%;
      justify-content: center;
      padding: 3%;
      background-color: #25D500;
      border-radius: 14px;
      border: #000000;
      font-size: 16px;
      white-space: nowrap;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      letter-spacing: 0;
    }
    .overlap-5:hover {
      color: #ffffff;
      background-color: #0D56A6;
    }
    .text-wrapper666 {
      font-size: 20px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      letter-spacing: 0;
      line-height: normal;
      text-align: center;
      margin-top: 2%;
      padding: 1%;
      white-space: nowrap;
    }
    .box1{
      padding: 1%;
      margin: 2%;
      background-color: #1c1b1b;
      width: 400px;
      
      border-radius: 14px; 
    }
    .center{
      padding: 1%;

      display: flex;
      justify-content: center;
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
    .email{
      color: #ffffff;
      padding: 1%;
      margin-left: 8%; 
      margin-top: 2%;
    }
    </style>
<body>
  @include('layouts.header')
    <h2 class="main-container68">Настройки</h2>
    <div class="center">
    <div class="box1">
      @foreach ($users as $user)
      <form action="{{route('updateuse', $user->id)}}" method="post">
        @csrf
        <div class="text-wrapper666">Почта</div>
        <div class="email">Ваша почта: {{$user->email}}</div>
        <input type="email" name="email"  placeholder="Введите новую почту" class="inp">
        <input type="email" placeholder="Подтвердите новую почту" class="inp">
        <button type="submit" class="overlap-5">Изменить почту</button>
    </div>
    </div>
    <div class="row">
    <div class="box1">
    <div class="text-wrapper666">Изменить имя</div>
    <input type="text" name="name" placeholder="Введите новое имя" class="inp">
    <button type="submit" class="overlap-5">Изменить имя</button>
    </div>
    <div class="box1">
    <div class="text-wrapper666">Пароль</div>
    <input type="password" name="password" placeholder="Введите новый пароль" class="inp">
    <button type="submit" class="overlap-5">Изменить пароль</button>
    </div>
    </form>
    </div>
    @endforeach
    <div class="row">
    <p class="hor">Передумали обновлять данные пользователя? <a href="{{route('render-userPage')}}">Вернуться</a></p>
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