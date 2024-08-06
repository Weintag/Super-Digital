<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="590;url={{ $protectedUrl }}" />
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
    }

    .wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #1b1b1b;
        border: 1px solid black;
        max-width: 400px;
        width: 100%;
        border-radius: 14px;
        padding: 30px 0;
    }

    .wrapper .title {
        background: #0D56A6;
        text-transform: uppercase;
        font-size: 18px;
        text-align: center;
        letter-spacing: 5px;
        height: 35px;
        line-height: 38px;
        color: #fff;
        margin-bottom: 10px;
    }

    .checkout_form {
        padding: 0 30px;
    }

    .checkout_form .input_item input[type="text"] {
        width: 100%;
        border: 0;
        background: transparent;
        text-align: center;
        border-bottom: 2px solid #fff;
        padding: 10px;
        transition: all 0.5s ease;
        color: #ffffff;
        font-size: 18px;
    }

    .checkout_form .input_item {
        margin-bottom: 10px;
    }

    .input_grp {
        margin-bottom: 10px;
    }

    .input_grp,
    .input_grp .input_item.expiry_field {
        display: flex;
        justify-content: space-between;
    }

    .input_grp .input_item {
        width: 45%;
    }

    .input_grp .input_item.expiry_field input[type="text"] {
        width: 45%;
    }

    .btn {
        width: 150px;
        background: #0D56A6;
        border: 1px solid black;
        color: #fff;
        font-size: 16px;
        line-height: 35px;
        text-align: center;
        border-radius: 20px;
    }

    .btn:hover {
        background: #F60018;
        color: #1b1b1b;
    }

    .btn a {
        display: block;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 5px;

        border: 2px #000;
        color: #1b1b1b;
    }

    .checkout_form .input_item input[type="text"]:focus {
        border-bottom: 2px solid #0D56A6;
    }

    ::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #fff;
    }

    ::-moz-placeholder {
        /* Firefox 19+ */
        color: #fff;
    }

    :-ms-input-placeholder {
        /* IE 10+ */
        color: #fff;
    }

    .tb {
        font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        color: #F60018;
        display: flex;
        text-align: center;
    }

    .row {
        font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif;
        font-size: 18px;
        display: flex;
        margin-top: 5%;
        justify-content: center;
    }

    .t1 {

        color: #fff;
        
    }

    .t2 {
        font-size: 18px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap; 
        color: #fff;
        padding-left: 19%;
        padding-right: 4%;
    }

    .block {
        padding: 1%;
        width: 100%;
        max-width: 400px;
        background-color: #1b1b1b;
        border-radius: 14px;
        display: inline-flex;
    }
</style>
<div class="row">
    <div class="block">
        <table>
            <tr>
        <td class="t1">Итоговая сумма к оплате:</td>
        <td class="t2">{{ $totalPrice }} ₽</td>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td class="t1">Почта получателя:</td>
                <td class="t2">{{$order->email}}</td>
            </tr>
          
        </table>
    </div>
</div>
<div class="wrapper">
    <div class="title">Форма оплаты</div>
    <form action="{{route('pay')}}" method="post" name="myform">
        @csrf
        <input type="hidden" value="{{$order->email}}" name="email">
        <input type="hidden" name="protected_url" value="{{ $protectUrl }}">
        @endforeach
        <div class="checkout_form">
            <div class="input_item">
                <input type="text" name="namederg" name placeholder="Имя держателя">
                @error('namederg')
                    <span class="tb">{{ $message }}</span>
                @enderror
            </div>
            <div class="input_item">
                <input type="text" pattern="[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}" name="cardcode"
                    placeholder="0000 0000 0000 0000" data-mask="0000 0000 0000 0000">
                @error('cardcode')
                    <span class="tb">{{ $message }}</span>
                @enderror
            </div>
            <div class="input_grp">
                <div class="input_item">
                    <input type="text" name="datecard" id="expiry-date" maxlength="5"
                        placeholder="MM / YY" data-mask="00 / 00">
                    @error('datecard')
                        <span class="tb">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input_item">
                    <input type="text" name="code3" maxlength="3" placeholder="* * *" data-mask="0 0 0">
                    @error('code3')
                        <span class="tb">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn">Подтвердить</button>
    </form>
</div>
</div>
</body>
<script>
    var cc = myform.cardcode;
    for (var i in ['input', 'change', 'blur', 'keyup']) {
        cc.addEventListener('input', formatCardCode, false);
    }

    function formatCardCode() {
        var cardCode = this.value.replace(/[^\d]/g, '').substring(0, 16);
        cardCode = cardCode != '' ? cardCode.match(/.{1,4}/g).join(' ') : '';
        this.value = cardCode;
    }
</script>
<script>
    $(document).ready(function(){
        $('#expiry-date').on('input', function() {
            let input = $(this).val();
            if (input.length === 2 && !input.includes('/')) {
                input += '/';
                $(this).val(input);
            }
        });
    });
</script>

</html>
