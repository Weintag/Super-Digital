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
  .main-container15 {
    border: 5px solid #000;
    background-color: #1c1b1b;
    align-self: center;
    display: flex;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    width: 402px;
    border-radius: 14px; 
    max-width: 100%;
    flex-direction: column;
    padding: 1%;
  }

  @media (max-width: 991px) {
    .main-container15 {
      margin-top: 40px;
    }
  }
  .cont{
    display: flex;
  }
  .auth{
    justify-content: center;
    color: #0D56A6;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: start;
    text-decoration: none;
    margin-right: 10px;
  }
  .sera{
    justify-content: center;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: start;
    text-decoration: none;
    margin-right: 10px;
  }
  .reg{
    justify-content: center;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: start;
    text-decoration: none;
  }
  .auth:hover{
    color: #F60018;
  }
  .reg:hover{
    color: #F60018;
  }

  label {
    display: flex;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 16px;
    font-weight: 400;
    align-self: start;
    margin-top: 4%;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    border-radius: 12px;
    border: #000;
    background-color: #0D56A6;
    align-self: stretch;
    display: flex;
    border: #000;
    color: #fff;
    font-size: 18px; 
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    padding: 1%
    margin-top: 13px;
    width: 100%;
    height: 38px;
    flex-direction: column;
  }

  .checkbox-container15 {
    align-self: center;
    display: flex;
    margin-top: 37px;
    width: 324px;
    max-width: 100%;
    align-items: flex-start;
    gap: 9px;
  }

  .checkbox-container15 input[type="checkbox"] {
    border-radius: 6px;
    background-color: #dc9226;
    align-self: start;
    display: flex;
    width: 28px;
    height: 25px;
    flex-direction: column;
  }

  .checkbox-container label {
    justify-content: center;
    color: #f3e5e5;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 14px;
    font-weight: 400;
    align-self: start;
    max-width: 290px;
    flex-grow: 1;
    flex-basis: auto;
  }

  button[type="submit"] {
    border-radius: 12px;
    border: #000;
    background-color: #25D500;
 
    margin-top: 4%;
    width: 100%;
    text-align: center;
    padding: 1%;
    color: #1c1b1b;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    
  }
  button[type="submit"]:hover{
    background-color: #F60018;
  }
  @media (max-width: 991px) {
    button[type="submit"] {
      margin-left: 1px;
    }
  }
  .tb{
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    color: #F60018;
    display: flex;
  }
  .row{
    display: flex;
    align-items: center;
  }
  .terms{
    padding: 1%;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 14px;
  }
  .pol{
    padding: 1%;
    width: 25px;
    height: 25px;
    border: #000;
    border-radius: 14px;
  }
  
  </style>
  @include('layouts.header')
  <body>
   <div class="main-container15">
    <div class="cont">
        <a href="{{ route('login') }}">
        <div class="auth">Вход</div>
        </a>
        <div class="sera">/</div>
        <a href="{{ route('render-register') }}">
        <div class="reg">Регистрация</div>
        </a>
    </div>
    <form action="{{ route('render-register') }}" method="post" autocomplete="off">
    @csrf
    <label for="name" class="topar">Имя:</label>
    <input type="text" name="name" value="{{ old('name') }}"/>
    @error('name')
    <span class="tb">{{$message}}</span>
    @enderror
    <label for="email" class="topar">Почта:</label>
    <input type="email" name="email" value="{{ old('email') }}"/>
    @error('email')
    <span class="tb">{{$message}}</span>
    @enderror
    <label for="password" class="topar">Пароль:</label>
    <input type="password" name="password"/>
    @error('password')
    <span class="tb">{{$message}}</span>
    @enderror
    <label for="password_confirm" class="topar">Повторить пароль:</label>
    <input type="password" name="password_confirmation" />
    <div class="checkbox-container">
      <div class="row">
    <input type="checkbox" name="politic" class="pol" id="terms" />
    <div for="terms" class="terms">Я согласен с условиями <a href="{{route('render-userAgr')}}">пользовательского соглашения</a> Супер Цифровой</div>
      </div>
    @error('politic')
    <span class="tb">{{$message}}</span>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
  </form>
</div>

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