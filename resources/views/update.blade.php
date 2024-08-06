
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
    -webkit-text-stroke: 1px black;
    margin: 1%;
  }
  .for{
    display: flex;
    flex-direction: column;
  }
  .hor{
    text-align: center;
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
      font-size: 20px;
      background-color: #1c1b1b;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }
    br{
      display: none;
    }
</style>
<body>
  @include('layouts.header')
    <div class="for">
    <div class="main-container68">Обновление товара</div></br>
      <table>
        <tr>
      <th><div class="text-wrapper666">Категория</div></th>
      <th><div class="text-wrapper666">Изображение</div></th>
      <th><div class="text-wrapper666">Название товара</div></th>
      <th><div class="text-wrapper666">Цена, ₽</div></th>
      <th><div class="text-wrapper666">Остаток, ед.</div></th>
      <th><div class="text-wrapper666">Тип</div></th>
      <th><div class="text-wrapper666">Дата выхода</div></th>
      <th><div class="text-wrapper666">Издатель</div></th>
      <th><div class="text-wrapper666">Разработчик</div></th>
      <th><div class="text-wrapper666">Совместимые платформы</div></th>
      <th><div class="text-wrapper666">Жанры</div></th>
        </tr>
        <tr>
        @foreach ($catalogs as $catalog)
      <form action="{{route('update', $catalog->id)}}" method="post" enctype="multipart/form-data">
      @csrf
          <th><select name="category" class="categ" value="{{ $catalog->category }}">
          <option value="{{$catalog->category}}">{{$catalog->category}}</option>
                    <option value="steam">steam</option>
                    <option value="xbox">xbox</option>
                    <option value="playstation">playstation</option>
                    <option value="epicgames">epic games</option>
                    <option value="gog">gog</option>
                    </select></th><br>
          <th><img src="{{ asset('storage/catalog/' . $catalog->image) }}" width="150px" height="100px" object-position="center"
            object-fit="cover"><br>
          <input type="file" name="image" class="input-file"></th><br>
          <th><input type="text" name="name"  value="{{$catalog->name}}" class="inp"></th><br>
          <th><input type="text" name="price"  value="{{$catalog->price}}" class="inp"></th><br>
          <th><input type="text" name="quantity" value="{{$catalog->quantity}}" class="inp"></th><br>
          <th><input type="text" name="type" value="{{$catalog->type}}" class="inp"></th><br>
          <th><input type="date" name="date" value="{{$catalog->date}}" class="inp"></th><br>
          <th><input type="text" name="publisher" value="{{$catalog->publisher}}" class="inp"></th><br>
          <th><input type="text" name="developer" value="{{$catalog->developer}}" class="inp"></th><br>
          <th><input type="text" name="platforms" value="{{$catalog->platforms}}" class="inp"></th><br>
          <th><input type="text" name="genre" value="{{$catalog->genre}}" class="inp"></th><br>
          <th><button type="submit" class="overlap-5"><div class="text-wrapper-13">Обновить</div></button></th>
      </form>
        </tr>
        @endforeach
      </table>
    </div>
    <p class="hor">Передумали обновлять данные товара? <a href="{{route('render-admin')}}">Вернуться</a></p>
    @include('layouts.footer')
</body>
</html>
@endif