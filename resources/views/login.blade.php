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
  .main-container5 {
    border: 5px solid #000;
    background-color: #1c1b1b;
    align-self: center;
    display: flex;
    width: 402px;
    max-width: 100%;
    border-radius: 14px; 
    flex-direction: column;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    padding: 1%;
  }

  @media (max-width: 991px) {
    .main-container5 {
      margin-top: 40px;
    }
  }
  .cuphead{
    display: flex;
  }
  .login {
    justify-content: center;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: start;
    margin-right: 10px;
  }

  .divider {
    justify-content: center;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: start;
    margin-right: 10px;
  }

  .registration {
    justify-content: center;
    color: #0D56A6;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: start;
    white-space: nowrap;
  }

  .login:hover{
    color: #F60018;
  }

  .registration:hover{
    color: #F60018;
  }

  .label {
    justify-content: center;
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 16px;
    font-weight: 400;
  }

  .input {
    border-radius: 12px;
    background-color: #0D56A6;
    align-self: start;
    display: flex;
    margin-top: 15px;
    margin-bottom: 15px;
    width: 100%;
    height: 38px;
    flex-direction: column;
  }

  .login-button {
    border-radius: 12px;
    border: #000;
    background-color: #25D500;
    align-self: start;
    display: flex;
    margin-top: 49px;
    width: 100%;
    flex-direction: column;
    padding: 1%;
  }
  .login-button:hover{
    background-color: #F60018;
  }
  .button-text {
    justify-content: center;
    color: #070505;
    text-align: center;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    font-size: 24px;
    font-weight: 400;
    align-self: center;
    
  }
  input[type="email"],
  input[type="password"]{
    border: #000;
    color: #fff;
    font-size: 18px; 
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    padding: 1%
  }
  .tb{
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    color: #F60018;
    display: flex;
    margin-top: -10px;
  }
  .alert-success{
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    color: #F60018;
    margin-bottom: -20px;
  }
  .row{
    display: flex;
    align-items: center; 
  }
  .remember{
    width: 25px;
    height: 25px;
    border: #000;
    border-radius: 14px;
  }
  .rem{
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    padding: 1%;
  }
  .rem1{
    color: #fff;
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    padding: 1%;
    margin-left: 10%;
  }
  .logincol{
    margin-top: 5%;
  }
</style>
  <body>
    @include('layouts.header')
    <div class="main-container5">
  <div class="cuphead">
    <a href="{{ route('login') }}">
    <h2 class="login">Вход</h2>
    </a>
    <h2 class="divider">/</h2>
    <a href="{{ route('render-register') }}">
    <h2 class="registration">Регистрация</h2>
    </a>
  </div>
  <div class="logincol">
  <form  action="{{route('login')}}" method="post" autocomplete="off">
    @csrf
  <label for="email" class="label">Почта:</label>
  <input type="email" name="email" class="input" value="{{ old('email') }}"/>
  @error('email')
  <span class="tb">{{$message}}</span>
  @enderror
  <label for="password" class="label">Пароль:</label>
  <input type="password" name="password" class="input" />
  @error('password')
    <span class="tb">{{$message}}</span>
  @enderror
  @if(session('error'))
    <div class="alert-success">
        {{ session('error') }}
    </div>
@endif

<div class="row">
  <input type="checkbox" name="remember" class="remember">
  <span class="rem">Запомнить меня</span>
  <a href="{{ route('password.request') }}" class="rem1">Забыли свой пароль?</a>
</div>
  <button class="login-button" type="submit">
    <span class="button-text">Войти</span>
  </button>
</form>
</div>
    </div>
    @include('layouts.footer')
    
  </body>
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
</html>