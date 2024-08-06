<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/catalog.css', 'resources/css/app.css'])
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
</head>
<style>
    .repult {
        font-family: "Encode Sans Condensed-Regular", Helvetica;
        margin-left: 30.5%;
        margin-top: 50px;
        font-size: 24px;
    }

    @media(max-width: 991px) {
        .repult {
            font-size: 18px;
        }

        .cont123 {
            display: none;
        }
    }
</style>

<body>
    @include('layouts.header')
    <div class="obj">
        <div class="bann">
            <div class="repult">
                @if ($count >= '1')
                    <div>По запросу найден(-о) {{ $count }} товар(-ов)</div>
                @elseif($count == '0')
                    <div>По запросу ничего не найдено</div>
                @endif
            </div>
            <div class="obj">
                <div class="cont123">
                    <div class="main-container2">
                        <div class="dron">
                            <button onclick="myDron()" class="dron" id="dron">
                                <div class="image-wrapper1">
                                    <img id="showLayers" loading="lazy"
                                        srcset="{{ asset('storage/img/ri_arrow-drop-down-line.svg') }}"
                                        class="img1" />
                                    <div class="description">По цене</div>
                                </div>
                            </button>
                            <div id="myDron" class="dron-content">
                                <a href="{{ route('sort', ['sort' => 'asc']) }}">
                                    <p>По возрастанию</p>
                                </a>
                                <a href="{{ route('sort', ['sort' => 'desc']) }}">
                                    <p>По убыванию</p>
                                </a>
                            </div>
                        </div>
                        <div class="dron">
                            <button onclick="myDrona()" class="dron" id="dron1">
                                <div class="image-wrapper1">
                                    <img id="showLayers1" loading="lazy"
                                        srcset="{{ asset('storage/img/ri_arrow-drop-down-line.svg') }}"
                                        class="img1" />
                                    <div class="description">Категории</div>
                                </div>
                            </button>
                            <div id="myDrona" class="dron-content">
                                <p>Игры</p>
                            </div>
                        </div>
                        <div class="dron">
                            <button onclick="myDrona1()" class="dron" id="dron2">
                                <div class="image-wrapper1">
                                    <img id="showLayers2" loading="lazy"
                                        srcset="{{ asset('storage/img/ri_arrow-drop-down-line.svg') }}"
                                        class="img1" />
                                    <div class="description">Платформа</div>
                                </div>
                            </button>
                            <div id="myDrona1" class="dron-content">
                                <a href="{{ route('sort', ['sort' => 'playstation4']) }}">
                                    <p>Playstation 4</p>
                                </a>
                                <a href="{{ route('sort', ['sort' => 'playstation5']) }}">
                                    <p>Playstation 5</p>
                                </a>
                                <a href="{{ route('sort', ['sort' => 'xbox360']) }}">
                                    <p>Xbox 360</p>
                                </a>
                                <a href="{{ route('sort', ['sort' => 'xboxone']) }}">
                                    <p>Xbox One</p>
                                </a>
                                <a href="{{ route('sort', ['sort' => 'xboxseriess']) }}">
                                    <p>Xbox Series S/Xbox Series X</p>
                                </a>
                                <a href="{{ route('sort', ['sort' => 'pc']) }}">
                                    <p>PC</p>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="obj1">
                    <div class="obj2">
                        @foreach ($catalogs as $catalog)
                            @if ($catalog->sale == '0')
                                <div class="framecart" id="myTable">
                                    <div class="overlap-group1">
                                        <a href="{{ route('render-prod', $catalog->id) }}"><img class="screenshotcart1"
                                                src="{{ asset('storage/catalog/' . $catalog->image) }}" /></a>
                                        <p class="tex">{{ $catalog->name }}</p>
                                        @if ($catalog->category == 'steam')
                                            <div class="line"><img class="cat"
                                                    src="{{ asset('storage/img/mdi_steam.svg') }}">
                                            @elseif($catalog->category == 'xbox')
                                                <div class="line"><img class="cat"
                                                        src="{{ asset('storage/img/ri_xbox-fill11.svg') }}">
                                                @elseif($catalog->category == 'playstation')
                                                    <div class="line"><img class="cat"
                                                            src="{{ asset('storage/img/ri_playstation-fill11.svg') }}">
                                                    @elseif($catalog->category == 'epicgames')
                                                        <div class="line"><img class="cat"
                                                                src="{{ asset('storage/img/simple-icons_epicgames.svg') }}">
                                                        @elseif($catalog->category == 'gog')
                                                            <div class="line"><img class="cat"
                                                                    src="{{ asset('storage/img/mdi_gog.svg') }}">
                                        @endif
                                        <div class="text-wrapper1">{{ $catalog->price }} ₽</div>
                                    </div>
                                    @auth
                                        <form action="" method="post" id="formCart">
                                            <button class="mdi-cart-wrapper1 cart_button addCart" type="button"
                                                data-id="{{ $catalog->id }}"><img class="mdi-cart1"
                                                    src="{{ asset('storage/img/mdi_cart1.svg') }}" /></button>
                                        </form>
                                    </div>
                        </div>
                    @endauth
                    @guest
                        <a href="#cart" class="openCart"><button class="mdi-cart-wrapper1"><img class="mdi-cart1"
                                    src="{{ asset('storage/img/mdi_cart1.svg') }}" /></button></a>
                    </div>
                </div>
            @endguest
     

  
@elseif($catalog->sale == '1')
    <div class="framecart3">
        <div class="overlap-group1">
            <a href="{{ route('render-prod', $catalog->id) }}"><img class="screenshotcart1"
                    src="{{ asset('storage/catalog/' . $catalog->image) }}" /></a>
            <div class="line">
                <p class="tex">{{ $catalog->name }}</p>
                <div class="text-wrapper1">{{ $catalog->price }}</div>
            </div>
            @if ($catalog->category == 'steam')
                <div class="line1"><img class="cat" src="{{ asset('storage/img/mdi_steam.svg') }}">
                @elseif($catalog->category == 'xbox')
                    <div class="line1"><img class="cat" src="{{ asset('storage/img/ri_xbox-fill11.svg') }}">
                    @elseif($catalog->category == 'playstation')
                        <div class="line1"><img class="cat"
                                src="{{ asset('storage/img/ri_playstation-fill11.svg') }}">
                        @elseif($catalog->category == 'epicgames')
                            <div class="line1"><img class="cat"
                                    src="{{ asset('storage/img/simple-icons_epicgames.svg') }}">
                            @elseif($catalog->category == 'gog')
                                <div class="line1"><img class="cat"
                                        src="{{ asset('storage/img/mdi_gog.svg') }}">
            @endif
            <div class="text-wrapper2">{{ $catalog->pricesale }} ₽</div>
        </div>
        
        @auth
            <form action="" method="post" id="formCart">
                <button class="mdi-cart-wrapper1 addCart" type="button" data-id="{{ $catalog->id }}"><img
                        class="mdi-cart1" src="{{ asset('storage/img/mdi_cart1.svg') }}" /></button>
            </form>
        </div>
        </div>
    @endauth
    @guest
        <a href="#cart" class="openCart"><button class="mdi-cart-wrapper1"><img class="mdi-cart1"
                    src="{{ asset('storage/img/mdi_cart1.svg') }}" /></button></a>
        </div>
        </div>
    @endguest
    @endif
    @endforeach
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    @vite(['resources/js/bootstrap.js', 'resources/js/cart.js'])

    @include('layouts.footer')
    <div class="box-modal" id="modalCart">
        <div class="modal">
            <div class="modal-exit">
                <span class="modalClose">X</span>
            </div>
            <div class="modal-content">
                <span>Товар успешно добавлен в корзину</span>
                <div class="modal-button">
                    <button class="button-back modalClose" type="button">Продолжить покупки</button>
                    <a class="button-cart modalClose" id="openCart" href="#cart">Перейти в корзину</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* Когда пользователь нажимает на кнопку, переключаться раскрывает содержимое */
        function myDron() {
            document.getElementById("myDron").classList.toggle("showa");
        }

        // Закрыть раскрывающийся список, если пользователь щелкнет за его пределами.
        window.onclick = function(event) {
            if (!event.target.matches('.dron')) {
                var dropdowns = document.getElementsByClassName("drop-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('showa')) {
                        openDropdown.classList.remove('showa');
                    }
                }
            }
        }
    </script>
    <script>
        /* Когда пользователь нажимает на кнопку, переключаться раскрывает содержимое */
        function myDrona() {
            document.getElementById("myDrona").classList.toggle("showa");
        }

        // Закрыть раскрывающийся список, если пользователь щелкнет за его пределами.
        window.onclick = function(event) {
            if (!event.target.matches('.dron')) {
                var dropdowns = document.getElementsByClassName("drop-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('showa')) {
                        openDropdown.classList.remove('showa');
                    }
                }
            }
        }
    </script>
    <script>
        /* Когда пользователь нажимает на кнопку, переключаться раскрывает содержимое */
        function myDrona1() {
            document.getElementById("myDrona1").classList.toggle("showa");
        }

        // Закрыть раскрывающийся список, если пользователь щелкнет за его пределами.
        window.onclick = function(event) {
            if (!event.target.matches('.dron')) {
                var dropdowns = document.getElementsByClassName("drop-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('showa')) {
                        openDropdown.classList.remove('showa');
                    }
                }
            }
        }
    </script>
    <script>
        $('#dron').click(function() {
            $('#showLayers').toggleClass('rotate');
        });
    </script>
    <script>
        $('#dron1').click(function() {
            $('#showLayers1').toggleClass('rotate');
        });
    </script>
    <script>
        $('#dron2').click(function() {
            $('#showLayers2').toggleClass('rotate');
        });
    </script>


    <script>
        var slideIndex = 0;
        showSlides(slideIndex);

        function showSlides(n) {
            var slides = document.getElementsByClassName("slide");
            if (n >= slides.length) {
                slideIndex = 0
            }
            if (n < 0) {
                slideIndex = slides.length - 1
            }
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }

        document.querySelector(".prev").addEventListener("click", function() {
            showSlides(--slideIndex);
        });

        document.querySelector(".next").addEventListener("click", function() {
            showSlides(++slideIndex);
        });
    </script>
    <script>
        $('#cartBox').hover(function() {
            $('#cartProducts').css('display', 'block');
        }, function() {
            $('#cartProducts').css('display', 'none');
        });
    </script>
</body>

</html>
