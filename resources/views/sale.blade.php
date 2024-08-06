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
    margin: 36px auto;
  }
  .for{
    margin-top: -100px;
    margin-left: auto;
    margin-right: auto;
  }
  .hor{
    text-align: center;
    margin-top: 2%;
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
      padding-left: 5px;
      padding-right: 5px;
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
    <h2 class="main-container68">Назначение или обновление скидки</h2>
    <table border="3" class="for">
      <tr>
      <th><div class="text-wrapper666">Название товара</div></th>
      <th><div class="text-wrapper666">Цена, ₽</div></th>
    <th><div class="text-wrapper666">Наличие скидки</div></th>
    <th><div class="text-wrapper666">Цена при скидке</div></th>
      </tr>
      <tr>
        @foreach($catalogs as $catalog)
    <form action="{{route('sale', $catalog->id)}}" method="post">
    @csrf
        <input type="hidden" name="id" value="{{$catalog->id}}">
        <th>{{$catalog->name}}</th><br>
        <th>{{$catalog->price}}₽</th><br>
        <th><select type="text" name="sale"  value="{{$catalog->sale}}" class="categ">
        <option value="{{$catalog->sale}}">{{$catalog->sale}}</option>
                    <option value="0">0</option>
                  <option value="1">1</option>
        </select></th><br>
        <th><input type="text" name="pricesale" value="{{$catalog->pricesale}}" class="inp"></th><br>
        <th><button type="submit" class="overlap-5"><div class="text-wrapper-13">Обновить</div></button></th>
    </form>
    </tr>
    @endforeach
    </table>
    <p class="hor">Передумали назначать или обновлять скидку товара? <a href="/admin">Вернуться</a>
      @include('layouts.footer')
</body>
</html>
@endif