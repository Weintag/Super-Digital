@if(Auth::user()->admin)
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
  @vite(['resources/css/admin.css', 'resources/css/app.css'])
  <title>{{$title}}</title>

  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
</head>
<style>
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


  .arrowsort-none {
    display: none;
  }
  .inp {
    border-radius: 12px;
    border: #000;
    background-color: #0D56A6;
    align-self: stretch;
    display: flex;
    width: 100%;
    height: 38px;
    color: #ffffff;
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
  .arrowsort-show {
    display: flex;
    margin-top: -20px;
  }
</style>
@include('layouts.header')
<div class="group">
  <div class="overlap-10">
    <img class="mdi-cart-outline" src="{{asset('storage/img/mdi-cart-outline.svg')}}" />
    <a href="{{route('render-admin')}}">
      <div class="text-wrapper-17">Каталог товаров магазина</div>
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
      <div class="text-wrapper-20">Отзывы</div>
    </a>
    <div class="text-wrapper-21">/</div>
    <a href="{{route('render-adminorders')}}">
      <div class="text-wrapper-20">Заказы</div>
    </a>
    <div class="text-wrapper-18">Кол-во товаров: {{$count}} шт.</div>
  </div>
  <div class="overlap-4">
    <button class="overlap-6">
      <img class="img-555" src="{{asset('storage/img/flat-color-icons-plus.svg')}}" />
      <div class="text-wrapper-14">Добавить сведения о товаре</div>
    </button>
    <div class="modal">
      <div class="modal-content">
        <form action="{{route('insert')}}" method="post" enctype="multipart/form-data">
          @csrf
          <span class="close-button">X</span>
          <div class="titladd">Добавление сведении о товаре</div>
          <div class="cat">Выберите категорию</div>
          <select name="category" class="categ">
            <option value="steam">Steam</option>
            <option value="xbox">Xbox</option>
            <option value="playstation">Playstation</option>
            <option value="epicgames">Epic games</option>
            <option value="gog">GOG</option>
          </select><br>
          <input type="file" name="image" class="input-file">
          <input type="text" name="name" placeholder="Введите название" class="inp"><br>
          <input type="text" name="price" placeholder="Введите розничную цену" class="inp"><br>
          <input type="text" name="quantity" placeholder="Введите кол-во товара" class="inp"><br>
          <input type="text" name="type" placeholder="Введите тип товара" class="inp"><br>
          <div class="cat">Выберите дату выхода товара</div>
          <input type="date" name="date" class="inp"><br>
          <input type="text" name="publisher" placeholder="Введите имя издателя товара" class="inp"><br>
          <input type="text" name="developer" placeholder="Введите имя разработчика товара" class="inp"><br>
          <input type="text" name="platforms" placeholder="Введите совместимые платформы для товара" class="inp"><br>
          <input type="checkbox" name="genre[]" value="Экшн">
          <label>Экшн</label>
          <input type="checkbox" name="genre[]" value="Приключения" >
          <label>Приключения</label>
          <input type="checkbox" name="genre[]" value="Ролевые" >
          <label>Ролевые (RPG)</label>
          <input type="checkbox" name="genre[]" value="Стратегии" >
          <label>Стратегии</label>
          <input type="checkbox" name="genre[]" value="Казуальные" >
          <label>Казуальные</label>
          <input type="checkbox" name="genre[]" value="Спорт" >
          <label>Спорт</label><br>
          <input type="checkbox" name="genre[]" value="Гонки" >
          <label>Гонки</label>
          <input type="checkbox" name="genre[]" value="Симуляторы" >
          <label>Симуляторы</label>
          <button class="overlap-5" type="submit">
            <img class="fluent-accept" src="{{asset('storage/img/fluent-mdl2-accept-medium.svg')}}" />
            Применить
          </button>
        </form>
      </div>
    </div>
    <div class="overlap-9">
      <div class="search_box">
        <input class="search2" placeholder="Поиск..." name="search" type="search" id="searchInput" autocomplete="off">
        <div class="ic-baseline-search">
          <button class="sear" onclick="searchTable()"><img src="{{asset('storage/img/ic-baseline-search.svg')}}"></button>
        </div>
      </div>
      <div id="pagination-container" class="simple-pagination"></div>
    </div>
  </div>
  <div class="rectangle">
    <table id="myTable">
      <tr>
        <div class="div15">
          <div class="text-wrapper666 sortable" id="id"><span>№</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="25px" class="arrowsort-none">
          </div>
          <div class="text-wrapper667 sortable" id="category"><span>Категория</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper668">Изображение</div>


          <div class="text-wrapper669 sortable" id="name"><span>Название товара</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper6789 sortable" id="price"><span>Цена</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper670 sortable" id="quantity"><span>Остаток</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper671 sortable" id="sale"><span>Скидка</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper672 sortable" id="pricesale"><span>Цена при скидке</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper673 sortable" id="type"><span>Тип</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper674 sortable" id="date"><span>Дата выхода</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper671 sortable" id="publisher"><span>Издатель</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper671 sortable" id="developer"><span>Разработчик</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper675 sortable" id="platforms"><span>Совместимые платформы</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper671 sortable" id="genre"><span>Жанры</span>
            <img src="{{asset('storage/img/arrow.svg')}}" width="30px" class="arrowsort-none">
          </div>
          <div class="text-wrapper666">Действия
          </div>
        </div>
      </tr>


      @foreach ($catalogs as $catalog)

      <tr>
        <div class="main-containerad">
          <th class="titlead" width="50px">{{ $catalog->id }}</th>
          <th class="categad" width="110px">{{ $catalog->category }}</th>
          <th width="170px"><img loading="lazy" src="{{ asset('storage/catalog/' . $catalog->image) }}" class="imagead" width="150px" height="100px" /></th>
          <div class="descriptionad">
            <th class="namead" width="140px">{{ $catalog->name }}</th>
            <th class="pricead" width="100px">{{ $catalog->price }} ₽</th>
            <th class="quantityad" width="90px">{{ $catalog->quantity }} шт.</th>
            <th class="quantityad" width="30px">{{ $catalog->sale }}</th>
            <th class="quantityad" width="110px">{{ $catalog->pricesale }}</th>
            <th class="quantityad" width="110px">{{ $catalog->type }}</th>
            <th class="quantityad" width="80px">{{ $catalog->date }}</th>
            <th class="quantityad" width="110px">{{ $catalog->publisher }}</th>
            <th class="quantityad" width="110px">{{ $catalog->developer }}</th>
            <th class="quantityad" width="110px">{{ $catalog->platforms }}</th>
            <th class="quantityad" width="130px">{{ $catalog->genre }}</th>
            <th>
              <div class="orline">
                <a href="{{route('render-update', $catalog->id)}}" method="post">
                  <img loading="lazy" src="{{asset ('storage/img//admin//material-symbols_ink-pen.svg')}}" class="image-2ad" />
                </a>
                <a href="{{route('render-sale', $catalog->id)}}" method="post">

                  @if($catalog->sale == '0')

                  <button type="submit" class="act"><img loading="lazy" src="{{asset ('storage/img//admin//foundation_burst-sale.svg')}}" class="image-3ad" /></button>
                  @endif

                  @if($catalog->sale == '1')

                  <button type="submit" class="act"><img loading="lazy" src="{{asset ('storage/img//admin//foundation_burst-sale123.svg')}}" class="image-3ad" /></button>
                  @endif
                </a>
                <form action="{{route('delete', $catalog->id)}}" method="post">
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
      {{ $catalogs->onEachSide(2)->links('vendor.pagination.tailwind') }}
    </div>
  </div>
  <div>
  </div>
</div>
<div class="overlap">
</div>
<?php
?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#live_search").keyup(function() {
      var input = $(this).val();
      // alert(input);

      if (input != "") {
        $.ajax({
          url: "/search",
          method: "POST",
          data: {
            input: input
          },

          success: function(data) {
            $("#searchresult").html(data);
          }
        });
      } else {
        $("#searchresult").css("display", "none");
      }
    });
  });
</script>
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
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }
</script>
<script rel="views/js/modal.js">
  var modal = document.querySelector(".modal");
  var trigger = document.querySelector(".overlap-6");
  var closeButton = document.querySelector(".close-button");

  function toggleModal() {
    modal.classList.toggle("show-modal");
  }

  function windowOnClick(event) {
    if (event.target === modal) {
      toggleModal();
    }
  }

  trigger.addEventListener("click", toggleModal);
  closeButton.addEventListener("click", toggleModal);
  window.addEventListener("click", windowOnClick);



  $(document).ready(function() {
    $('.sort-button').click(function(e) {
      e.preventDefault();
      var column = $(this).data('column');

      $.ajax({
        url: '/sortproducts',
        method: 'GET',
        data: {
          id: column
        },
        success: function(data) {
          // Обновление данных таблицы с учетом новой сортировки
        },
        error: function(xhr, status, error) {
          // Обработка ошибок
        }
      });
    });
  });
</script>
@include('layouts.footer')
</body>

@vite(['resources/js/app.js','resources/js/sortable.js', 'resources/js/bootstrap.js',
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