<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
  @vite(['resources/css/header.css'])
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <div class="div">
      <div class="div-2">
        <div class="div-3">
          <div class="column">
            <div class="div-4">
              <a href="{{route('render-home')}}">
                <div class="div-5">
                  <img loading="lazy" srcset="{{asset('storage/img/logo/logo.png')}}" />
                </div>
              </a>
              <div class="dropdown">
                <button class="dropbtn">Каталог</button>
                <div class="dropdown-content">
                  <div class="games">Игры</div>
                  <div class="div-27">
                    <a href="{{route('render-steam')}}">
                      <img loading="lazy" srcset="{{asset('storage/img/mdi_steam.svg')}}" class="img-9" /></a>
                    <div class="div-28"><a href="{{route('render-steam')}}">Steam</a></div>
                  </div>
                  <div class="div-29">
                    <a href="{{route('render-playstation')}}">
                      <img loading="lazy" srcset="{{asset('storage/img/ri_playstation.svg')}}" class="img-10" />
                    </a>
                    <div class="div-30"><a href="{{route('render-playstation')}}">Playstation</a></div>
                  </div>
                  <div class="div-31">
                    <a href="{{route('render-xbox')}}">
                      <img loading="lazy" srcset="{{asset('storage/img/ri_xbox.svg')}}" class="img-11" />
                    </a>
                    <div class="div-32"><a href="{{route('render-xbox')}}">Xbox</a></div>
                  </div>
                  <div class="div-33">
                    <a href="{{route('render-epicgames')}}">
                      <img loading="lazy" srcset="{{asset('storage/img/simple-icons_epicgames.svg')}}" class="img-12" />
                    </a>
                    <div class="div-34"><a href="{{route('render-epicgames')}}">Epic games</a></div>
                  </div>
                  <div class="div-35">
                    <a href="{{route('render-gog')}}">
                      <img loading="lazy" srcset="{{asset('storage/img/mdi_gog.svg')}}" class="img-13" />
                    </a>
                    <div class="div-36"><a href="{{route('render-gog')}}">Gog com</a></div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="column-2">
            <div class="div-9">
              <div class="div-10">
                <div class="div-17">
                  <div class="dropdown" id="cartBox">
                    <button class="dropcorz">Мои покупки</button>
                    <div class="dropdown-cont" id="cartProducts">
                      @auth
                      @if($carts->isNotEmpty())
                        @php($notEmpty = 'block')
                        @php($empty = 'none')
                      @else
                        @php($notEmpty = 'none')
                        @php($empty = 'block')
                      @endif

                        <div id="notEmptyProduct" style="display: {{ $notEmpty }};">
                          <table class="tablca">
                            @foreach($carts as $cart)
                                <tr class="cartItem">
                                  <th width="30%">
                                    <img src="{{ asset('storage/catalog/' . $cart->product->image) }}" class="imcar"></img>
                                  </th>
                                  <th width="40%"> 
                                    <div class="ap">{{ $cart->product->name }}</div>
                                  </th>
                                  <th>
                                    @if($cart->product->sale == '0')
                                    <div class="ap">{{ $cart->product->price*$cart->count }} ₽</div>
                                    @else
                                      <div class="ap">{{ $cart->product->pricesale*$cart->count }} ₽</div>
                                    @endif
                                  </th>
                                  <th rowspan="1" valign="middle"  align="center">
                                    <button type="button" id="minusCart" data-id="{{ $cart->product->id }}" class="plmn" >-</button>
                                    @if($cart->product->sale == '0')
                                    <div class="ap" data-price="{{ $cart->product->price }}" >{{ $cart->count }}</div>
                                    @else
                                      <div class="ap" data-price="{{ $cart->product->pricesale }}" >{{ $cart->count }}</div>
                                    @endif
                                    <button type="button" id="plusCart" data-id="{{ $cart->product->id }}" class="plmn" >+</button>
                                  </th>
                                  <th>
                                    <form action="" method="post">
                                      <button type="button" id="deletProductCart" data-id="{{ $cart->product->id }}" class="delpro"><img src={{asset('storage/img/cross.svg')}} class="delpro"></button>
                                    </form>
                                  </th>
                                </tr>
                              @endforeach
                            </table>
                            <a href="{{route('orders')}}" class="but">
                              <div class="butor">Оформить заказ</div>
                            </a>
                        </div>
                        <div id="emptyProduct" style="display: {{ $empty }};">
                          <img class="cartcorz" src="{{asset('storage/img/mdi_cart22.svg')}}"></img>
                          <div class="empty-cart1">Ваша корзина пуста</div>
                          <div class="lincont"></div>
                          <div class="select-item">Выберите интересующий вас товар.</div>
                        </div>
                      @endauth
                      @guest
                      <img class="cartcorz" src="{{asset('storage/img/mdi_cart22.svg')}}">
                      <div class="empty-cart">Чтобы пользоваться корзиной вы должны войти в свой профиль</div>
                      @endguest
                    </div>
                  </div>
                </div>
                @guest
                <div class="div-19">
                  <a href="{{route('render-register')}}">
                    <img loading="lazy" srcset="{{asset('storage/img/ion_person-sharp.svg')}}" class="img-6" />
                  </a>
                  <div class="div-20"><a href="{{route('render-register')}}">Личный кабинет</a></div>
                  @endguest
                  @auth
                  <div class="div-19">
                    <a href="{{route('render-userPage')}}">
                      <img loading="lazy" srcset="{{asset('storage/img/ion_person-sharp.svg')}}" class="img-6" />
                    </a>
                    <div class="div-20"><a href="{{route('render-userPage')}}">{{ auth()->user()->name }} </a></div>
                    @endauth

                  </div>
                </div>
                <form action="{{route('search')}}" method="get">
                  <div class="div-21">
                    <div class="search1">
                      <input class="div-22" type="search" id="s" name="s" placeholder="Поиск товаров">
                      <button class="div-24">
                        <img loading="lazy" srcset="{{asset('storage/img/mingcute_search-fill.svg')}}" class="img-7" />
                      </button>
                    </div>
                </form>
                <div class="rowsale">
                <a href="{{route('render-stocks')}}">
                  <img loading="lazy" srcset="{{asset('storage/img/material-symbols_percent.svg')}}" class="img-8" />
                </a>
                <div class="div-25"><a href="{{route('render-stocks')}}">Акции</a></div>
                </div>
              </div>

            </div>
            <div class="div-26">
              <div class="div-27">
                <a href="{{route('render-steam')}}">
                  <img loading="lazy" srcset="{{asset('storage/img/mdi_steam.svg')}}" class="img-9" />
                </a>
                <div class="div-28"><a href="{{route('render-steam')}}">Steam</a></div>
              </div>
              <div class="div-29">
                <a href="{{route('render-playstation')}}">
                  <img loading="lazy" srcset="{{asset('storage/img/ri_playstation.svg')}}" class="img-10" />
                </a>
                <div class="div-30"><a href="{{route('render-playstation')}}">Playstation</a></div>
              </div>
              <div class="div-31">
                <a href="{{route('render-xbox')}}">
                  <img loading="lazy" srcset="{{asset('storage/img/ri_xbox.svg')}}" class="img-11" />
                </a>
                <div class="div-32"><a href="{{route('render-xbox')}}">Xbox</a></div>
              </div>
              <div class="div-33">
                <a href="{{route('render-epicgames')}}">
                  <img loading="lazy" srcset=" {{asset('storage/img/simple-icons_epicgames.svg')}}" class="img-12" />
                </a>
                <div class="div-34"><a href="{{route('render-epicgames')}}">Epic games</a></div>
              </div>
              <div class="div-35">
                <a href="{{route('render-gog')}}">
                  <img loading="lazy" srcset="{{asset('storage/img/mdi_gog.svg')}}" class="img-13" />
                </a>
                <div class="div-36"><a href="{{route('render-gog')}}">Gog com</a></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
</body>

</html>