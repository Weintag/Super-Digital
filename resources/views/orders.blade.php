<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/orders.css', 'resources/css/app.css'])
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
</head>
<style>
    .mail {
        margin-left: 50px;
        margin-top: 15px;
        border-radius: 14px;
        border: #000;
        height: 38px;
        color: #ffffff;
        background-color: #0D56A6;
        width: 350px;
    }
    .tb{
    font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    color: #F60018;
    display: flex;
    margin-left: 50px;
  }
</style>

<body>
    @include('layouts.header')
    <div class="main-container68">Оформление заказа</div>
    <div class="group">
        <div class="rectangle">
            <table class="ordertabl" id="ordertabl">
                <tr>
                    <th>
                    </th>
                    <th>
                        <div class="aap">Название</div>
                    </th>
                    <th>
                        <div class="aap">Цена</div>
                    </th>
                    <th>
                        <div class="aap">Количество</div>
                    </th>
                </tr>
                <tr>
                    @foreach ($carts as $cart)
                        <th width="13%">
                            <img src="{{ asset('storage/catalog/' . $cart->product->image) }}" class="imcar1"></img>
                        </th>
                        <th width="30%">
                            <div class="aap">{{ $cart->product->name }}</div>
                        </th>
                        <th width="20%">
                            @if ($cart->product->sale == '0')
                                <div class="aap prod" data-price="{{ $cart->product->price * $cart->count }}">
                                    {{ $cart->product->price * $cart->count }} ₽</div>
                            @else
                                <div class="aap prod" data-price="{{ $cart->product->pricesale * $cart->count }}">
                                    {{ $cart->product->pricesale * $cart->count }} ₽</div>
                            @endif
                        </th>
                        <th width="20%">
                            @if ($cart->product->sale == '0')
                                <div class="aap count" data-price="{{ $cart->product->price }}">{{ $cart->count }}
                                </div>
                            @elseif($cart->product->sale == '1')
                                <div class="aap count" data-price="{{ $cart->product->pricesale }}">
                                    {{ $cart->count }}
                                </div>
                            @endif
                        </th>
                </tr>
                @endforeach
                <tr>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                        <div class="mar11">ИТОГ:</div>
                        <span class="ma1n12" id="total-price"></span>
                        
                    </th>
                </tr>
            </table>
            <form action="{{ route('payment') }}" method="post">
                @csrf
                <div class="mar">СПОСОБ ОПЛАТЫ:</div>
                <div class="rowpr">
                    <select name="pay" class="pay">
                        <option value="МИР">МИР</option>
                        <option value="MasterCard">MasterCard</option>
                        <option value="Visa">Visa</option>
                    </select>
                </div>
                <div class="card12">Принимаются все банковские карты РФ - МИР/VISA/MasterCard.</div>
                <div class="mar">ПОЧТА:</div>
                <input type="email" name="email" class="mail"><br>
                @error('email')
                <span class="tb">{{$message}}</span>
                @enderror
                <button type="submit" class="paym">Оплатить</button>

            </form>

        </div>
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
    <script>
        $(document).ready(function() {
            var total = 0;
            $(".prod").each(function() {
                var price = parseFloat($(this).data('price')); // Получаем цену товара
                total += price; // Добавляем цену к общей сумме

            });
            $("#total-price").text(total + " ₽");
        });
    </script>
</body>

</html>
