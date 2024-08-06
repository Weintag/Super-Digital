@if(Auth::user()->admin)

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
    margin-left: 480px;
    align-self: center;
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
      margin-top: 10px;
      margin-bottom: 10px;
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
    .overlap-5 {
      display: flex;
      text-align: center;
      height: 42px;
      background-color: #25D500;
      border-radius: 14px;
      border: #000000;
    }
    .overlap-5:hover {
      background-color: #0D56A6;
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
</style>
<body>
  @include('layouts.header')
    <h2 class="main-container68">Обновление сообщений по форме связи</h2>
    <table border="3" class="for">
      <tr>
    <th><div class="text-wrapper666">Почта</div></th>
    <th><div class="text-wrapper666">Сообщение</div></th>
      </tr>
      <tr>
        @foreach($rubrics as $rubric)
    <form action="{{route('updaterub', $rubric->id)}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$rubric->id}}">
    <th><input type="text" name="email"  value="{{$rubric->email}}" class="inp"></th><br>
    <th width="600px"><textarea type="text" name="message"  value="{{$rubric->message}}" placeholder="{{$rubric->message}}" class="inpa"></textarea></th><br>
    <th><button type="submit" class="overlap-5"><div class="text-wrapper-13">Обновить</div></button></th>
    </form>
    </tr>
    @endforeach
    </table>
    <p class="hor">Передумали обновлять данные? <a href="{{route('render-adminrubrics')}}">Вернуться</a></p>
    @include('layouts.footer')
</body>
</html>
@endif