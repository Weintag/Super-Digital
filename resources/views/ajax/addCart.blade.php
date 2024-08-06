<table class="tablca">
    @foreach ($carts as $cart)
        <tr class="cartItem">
            <th width="30%">
                <img src="{{ asset('storage/catalog/' . $cart->product->image) }}" class="imcar"></img>
            </th>
            <th width="40%">
                <div class="ap">{{ $cart->product->name }}</div>
            </th>
            <th>
                @if ($cart->product->sale == '0')
                    <div class="ap">{{ $cart->product->price * $cart->count }} ₽</div>
                @else
                    <div class="ap">{{ $cart->product->pricesale * $cart->count }} ₽</div>
                @endif
            </th>
            <th rowspan="1" valign="middle" align="center">
                <button type="button" id="minusCart" data-id="{{ $cart->product->id }}" class="plmn">-</button>
                @if ($cart->product->sale == '0')
                    <div class="ap" data-price="{{ $cart->product->price }}">{{ $cart->count }}</div>
                @else
                    <div class="ap" data-price="{{ $cart->product->pricesale }}">{{ $cart->count }}</div>
                @endif
                <button type="button" id="plusCart" data-id="{{ $cart->product->id }}" class="plmn">+</button>
            </th>
            <th>
                <form action="" method="post">
                    <button type="button" id="deletProductCart" data-id="{{ $cart->product->id }}" class="delpro"><img
                            src={{ asset('storage/img/cross.svg') }} class="delpro"></button>
                </form>
            </th>
        </tr>
    @endforeach
</table>
<a href="{{ route('orders') }}" class="but">
    <div class="butor">Оформить заказ</div>
</a>
