@if(Auth::user()->admin)

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    @vite(['resources/css/app.css'])
    <title>{{$title}}</title>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
  </head>
  <style>
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

    .group-25 {
      display: flex;
    }

    .overlap-10 {
      display: flex;
      width: auto;
      height: 64px;
      background-color: #1c1b1b;
      border-radius: 14px;
      flex-wrap: wrap;
    }
    .text-wrapper-21 {
      color: #ffffff;
      font-size: 20px;
      margin-top: 15px;
      margin-bottom: 10px;
      margin-left: 10px;
      display: flex;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
    }
    .text-wrapper-17 {
      color: #ffffff;
      font-size: 20px;
      margin-top: 15px;
      margin-bottom: 10px;
      margin-left: 10px;
      display: flex;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
    }
    .text-wrapper-17:hover{
      color:#F60018;
    }
    .text-wrapper-20 {
      color: #0D56A6;
      font-size: 20px;
      margin-top: 15px;
      margin-bottom: 10px;
      margin-left: 10px;
      display: flex;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
    }
    .text-wrapper-20:hover{
      color:#F60018;
    }
    .mdi-cart-outline {
      display: flex;
      margin-left: 20px;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .text-wrapper-18 {
      color: #ffffff;
      font-size: 20px;
      display: flex;
      margin-top: 15px;
      margin-left: auto;
      margin-right: 50px;
      margin-bottom: 10px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: right;
      letter-spacing: 0;
      line-height: normal;
    }

    .overlap-4 {
      display: flex;
      margin-top: 20px;
      margin-left: 50px;
      margin-right: 50px;
      height: 86px;
      background-color: #ffffff;
      border-radius: 14px;
    }

    .overlap-6 {
      display: flex;
      margin-top: 20px;
      margin-left: 30px;
      width: 212px;
      height: 42px;
      background-color: #f04d41;
      border-radius: 14px;
      border: #000000;
    }

    .overlap-6:hover {
      background-color: #3045e5;
    }

    .text-wrapper-14 {
      width: 127px;
      top: 11px;
      left: 58px;
      font-size: 16px;
      display: flex;
      margin-top: 10px;
      margin-bottom: 10px;
      margin-left: 10px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }

    .img-555 {
      display: flex;
      width: 35px;
      height: 35px;
      margin-top: 1px;
      margin-bottom: 5px;
      margin-left: 5px;
    }

    .overlap-7 {
      display: flex;
      margin-top: 20px;
      margin-left: 30px;
      width: 212px;
      height: 42px;
      background-color: #3045e5;
      border-radius: 14px;
    }

    .overlap-5 {
      display: flex;
      margin-top: 20px;
      margin-left: 30px;
      width: 212px;
      height: 42px;
      background-color: #3ffa99;
      border-radius: 14px;
      border: #000000;
    }

    .overlap-5:hover {
      background-color: #3045e5;
    }

    .text-wrapper-13 {
      width: 127px;
      top: 11px;
      left: 58px;
      color: #1c1b1b;
      font-size: 16px;
      white-space: nowrap;
      display: flex;
      margin-top: 10px;
      margin-bottom: 10px;
      margin-left: 10px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
    }

    .fluent-accept {
      display: flex;
      width: 35px;
      height: 35px;
      margin-top: 5px;
      margin-bottom: 5px;
      margin-left: 15px;
    }

    .overlap-9 {
    display: inline-flex;
    margin-top: 20px;
    padding-left: 2%;
    padding-right: 1%;
    margin-left: auto;
    margin-right: 11%;
    max-width: 513px;
    height: 50%;
    background-color: #d9d9d9;
    border-radius: 14px;
    border-color: 0;
    align-items: center;
    justify-content: center;
 
  }

  .search2 {
    border-radius: 14px;
    border: 0;
    outline: 0;
    width: 470px;
    background: none;
    display: flex;
  
  }

  .search2::placeholder {
    width: 97px;
    top: 12px;
    color: #000000;
    font-size: 16px;
    white-space: nowrap;
    display: flex;
    font-family: "Encode Sans Condensed", Helvetica;
    font-weight: 400;
    letter-spacing: 0;
    line-height: normal;
  }

  .ic-baseline-search {
    display: flex;
    width: 35px;
    height: 35px;

  }
  .search_box{
    display: inline-flex;
  }

    .overlap-8 {
      display: flex;
      width: 45px;
      height: 45px;
      margin-top: 20px;
      margin-left: 10px;
      background-color: #1c1b1b;
      border-radius: 14px;
    }

    .rectangle {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
      margin-left: 50px;
      margin-right: 50px;
      top: 0;
      left: 1px;
      background-color: #ffffff;
      border-radius: 30px;
    }

    .div15 {
      height: 83px;
      width: auto;
      background-color: #1c1b1b;
      border-radius: 14px 14px 0px 0px;
      display: inline-flex;
    }

    .rectangle-15 {
      width: 24px;
      height: 24px;
      margin-top: 30px;
      margin-left: 30px;
      background-color: #d9d9d9;
      border-radius: 4px;
    }

    .text-wrapper666 {
      top: 0;
      left: 0;
      font-size: 20px;
      display: flex;
      margin-top: 30px;
      margin-left: 70px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }

    .text-wrapper667 {
      top: 0;
      left: 0;
      font-size: 20px;
      display: flex;
      margin-top: 30px;
      margin-left: 120px;
      margin-right: 47px;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }

    .text-wrapper668 {
      top: 0;
      left: 0;
      font-size: 20px;
      display: flex;
      margin-top: 30px;
      margin-left: 15%; 
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }
    .text-wrapper669 {
      top: 0;
      left: 0;
      font-size: 20px;
      display: flex;
      margin-top: 30px;
      margin-left: 20%;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }
    .text-wrapper670 {
      top: 0;
      left: 0;
      font-size: 20px;
      display: flex;
      margin-top: 30px;
      margin-left: 11%;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }
    .text-wrapper671 {
      top: 0;
      left: 0;
      font-size: 20px;
      display: flex;
      margin-top: 30px;
      margin-left: 9%;
      font-family: "Encode Sans Condensed", Helvetica;
      font-weight: 400;
      color: #ffffff;
      text-align: center;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }

    .gridicons-dropdown {
      width: 14px;
      margin-top: 7px;
      display: flex;
      height: 15px;
      transition: 0.5s ease;
      cursor: pointer;
      background: none;
      background-image: url("/views/img/gridicons-dropdown-2.svg");
	    color: inherit;
	    border: none;
    }
    .rotate {
      transform: rotate(-180deg);
      flex-shrink: 0;
    
    }

    @media (max-width: 1850px) {
      .div15 {
        margin-left: auto;
        margin-right: auto;
        height: 200px;
        flex-wrap: wrap;
      }
    }

    @media (max-width: 1400px) {
      .overlap-4 {
        height: auto;
        flex-wrap: wrap;

      }

      .overlap-9 {
        width: 400px;
        margin-right: auto;
        margin-left: auto;
      }
    }

    @media (max-width: 991px) {
      .group {
        margin-left: auto;
      }

      .overlap-10 {
        height: auto;
        flex-wrap: wrap;
        flex-direction: column;
      }

      .overlap-4 {
        height: auto;
        flex-wrap: wrap;

      }

      .mdi-cart-outline {
        margin-left: auto;
        margin-right: auto;
      }

      .text-wrapper-17 {
        margin-left: auto;
        margin-right: auto;
      }

      .text-wrapper-18 {
        margin-right: auto;
        margin-left: auto;
      }

      .div15 {
        margin-right: auto;
        height: 300px;
        flex-wrap: wrap;
      }

      .text-wrapper666 {
        margin-left: auto;
        margin-right: auto;
      }

      .text-wrapper667 {
        margin-left: auto;
        margin-right: auto;
      }

      .text-wrapper668 {
        margin-left: auto;
        margin-right: auto;
      }

      .text-wrapper669 {
        margin-left: auto;
        margin-right: auto;
      }
    }

    .inp {
      border-radius: 12px;
      border: #000;
      background-color: #3045e5;
      align-self: stretch;
      display: flex;
      width: 100%;
      height: 38px;
      flex-direction: column;
    }

    .inp::placeholder {
      top: 0;
      left: 0;
      font-size: 16px;
      display: flex;
      margin-left: 15px;
      font-family: "Encode Sans Condensed", Helvetica;
      color: #ffffff;
      letter-spacing: 0;
      line-height: normal;
      white-space: nowrap;
    }

    .cat {
      top: 0;
      left: 0;
      font-family: "Encode Sans Condensed", Helvetica;
    }

    .categ {
      border-radius: 12px;
      border: #000;
      background-color: #3045e5;
      color: #ffffff;
      height: 38px;
    }

    .input-file {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    #sh1{
      transition: transform 0.3s;
    }
    .rotate {
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
}
    .modal {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      visibility: hidden;
      transform: scale(1.1);
      transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }

    .modal-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 1rem 1.5rem;
      width: 24rem;
      border-radius: 0.5rem;
    }

    .close-button {
      float: right;
      width: 1.5rem;
      line-height: 1.5rem;
      text-align: center;
      cursor: pointer;
      border-radius: 0.25rem;
      background-color: lightgray;
    }

    .close-button:hover {
      background-color: darkgray;
    }

    .show-modal {
      opacity: 1;
      visibility: visible;
      transform: scale(1.0);
      transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }

    .main-containerad {
      display: flex;

    }

    @media (max-width: 991px) {
      .main-containerad {
        flex-wrap: wrap;

      }
    }

    .titlead {
      justify-content: center;
      color: #000;
      text-align: center;
      align-self: center;


      font: 400 18px/22.5px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    .imagead {
      margin-top: 20px;
      max-width: 100%;
    }

    .descriptionad {
      align-self: center;
      display: flex;
      align-items: center;

    }

    @media (max-width: 991px) {
      .descriptionad {
        max-width: 100%;
        flex-wrap: wrap;
        justify-content: center;
      }
    }

    .namead {
      justify-content: center;
      color: #000;
      text-align: center;
      align-self: center;

      font: 400 18px/22.5px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    .pricead {
      justify-content: center;
      color: #000;
      text-align: center;
      border-radius: 6px;
      align-self: stretch;
      flex-grow: 1;
      align-items: center;
      padding: 11px 20px;

      font: 400 18px/22.5px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }


    .categad {
      justify-content: center;
      color: #000;
      text-align: center;
      text-align: center;
      align-self: center;
      margin-left: 125px;
      font: 400 18px/22.5px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    .quantityad {
      justify-content: center;
      color: #000;
      text-align: center;
      border-radius: 6px;
      align-self: stretch;
      align-items: center;
      padding: 12px 20px;

      font: 400 18px/22.5px Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }


    .image-2ad {
      max-width: 100%;
      width: 40px;
    }

    .image-3ad {
      max-width: 100%;
      width: 40px;
      margin-left: 0px;
    }
    .orline {
      justify-content: center;
      display: flex;
    }

    .act {
      background: none;
      color: inherit;
      border: none;
      padding: 0;
      font: inherit;
      cursor: pointer;
      outline: inherit;
    }
    .sear{
      all: unset;
    }
    .arrowsort-none{
      display: none;
    }
    .arrowsort-show{
      display: flex;
      margin-top: -20px;
    }
  </style>
  @include('layouts.header')
  <div class="group">
    <div class="overlap-10">
      <img class="mdi-cart-outline" src="{{asset('storage/img/mdi-cart-outline.svg')}}" />
      <a href="{{route('render-admin')}}">
        <div class="text-wrapper-20">Каталог товаров магазина</div>
      </a>
      <div class="text-wrapper-21">/</div>
      <a href="{{route('render-adminusers')}}">
        <div class="text-wrapper-20">Пользователи</div>
      </a>
      <div class="text-wrapper-21">/</div>
      <a href="{{route('render-adminrubrics')}}">
        <div class="text-wrapper-20">Обратная связь</div>
      </a>
      <div class="text-wrapper-21">/</div>
      <a href="{{route('render-adminreviews')}}">
        <div class="text-wrapper-17">Отзывы</div>
      </a>
      <div class="text-wrapper-21">/</div>
      <a href="{{route('render-adminorders')}}">
        <div class="text-wrapper-20">Заказы</div>
      </a>
      <div class="text-wrapper-18">Кол-во отзывов: {{$count}} шт.</div>
    </div>
    <div class="overlap-4">
     
      <div class="overlap-9">
      <div class="search_box">
        <input class="search2" placeholder="Поиск..." name="search" type="search" id="searchInput" autocomplete="off">
        <div class="ic-baseline-search">
          <button class="sear" onclick="searchTable()"><img src="{{asset('storage/img/ic-baseline-search.svg')}}"></button>
        </div>
      </div>
      </div>
      <div id="pagination-container" class="simple-pagination"></div>
    </div>
    <div class="rectangle">
      <table border="3" id="myTable">
        <tr>
          <div class="div15">
            <div class="text-wrapper666 sortable" id="id"><span>№</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="25px" class="arrowsort-none">
            </div>
            <div class="text-wrapper667 sortable" id="name"><span>Имя пользователя</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="25px" class="arrowsort-none">
            </div>
            <div class="text-wrapper668">Отзыв
            </div>
            <div class="text-wrapper669 sortable" id="type"><span>Тип</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="25px" class="arrowsort-none">
            </div>
            <div class="text-wrapper670 sortable" id="created_at"><span>Дата</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="25px" class="arrowsort-none">
            </div>
            <div class="text-wrapper671">Действия
            </div>
          </div>
        </tr> 
     @foreach ($reviews as $review)
          <tr>

            <div class="main-containerad">
              <th class="titlead" width="170px">{{$review->id}}</th>
              <th class="categad" width="250px">{{$review->user->name}}</th>
              <div class="descriptionad">
                <th class="namead" width="540px">{{$review->review}}</th>
                <th class="pricead" width="200px">{{$review->type}}</th>
                <th class="pricead" width="220px">{{$review->created_at}}</th>
                <th>
                  <div class="orline">
                    <form action="{{route('deleterev', $review->id)}}" method="post">
                      @csrf
                      <button type="submit" class="act"><img loading="lazy" src="{{asset('storage/img//admin//game-icons_trash-can.svg')}}" class="image-3ad" /></button>
                    </form>
                  </div>
                </th>

              </div>
            </div>

          </tr>

        @endforeach
      </table>
      <div class="col-md-12">
      {{ $reviews->onEachSide(2)->links('vendor.pagination.bootstrap-4') }}
    </div>
    </div>
    <div>

    </div>
  </div>
  <div class="overlap">
  </div>
  <script>
  function searchTable() {
  // Получение поискового запроса из поля ввода
  var input = document.getElementById("searchInput");
  var query = input.value.toLowerCase();

  // Получение таблицы и строк таблицы
  var table = document.getElementById("myTable");
  var rows = table.getElementsByTagName("tr");

  // Перебор строк таблицы и скрытие строк, не соответствующих запросу
  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var cells = row.getElementsByTagName("th");
    var match = false;

    // Проверка каждой ячейки в строке на соответствие запросу
    for (var j = 0; j < cells.length; j++) {
      var cell = cells[j];
      if (cell.innerHTML.toLowerCase().indexOf(query) > -1) {
        match = true;
        break;
      }
    }

    // Отображение или скрытие строки в зависимости от результата поиска
    if (match) {
      row.style.display = "block";
    } else {
      row.style.display = "none";
    }
  }
}
</script>
  @include('layouts.footer')
  </body>
  @vite(['resources/js/app.js','resources/js/sortablerev.js', 'resources/js/bootstrap.js',
  'resources/js/cart.js',])
      <script>
          $('#cartBox').hover(function(){
            $('#cartProducts').css('display', 'block');
          }, function () {
            $('#cartProducts').css('display', 'none');
          });
  
      </script>
  </html>
@endif