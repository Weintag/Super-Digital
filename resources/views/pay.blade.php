<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
</head>
<style>
    ._failed{ border-bottom: solid 4px red !important; }
._failed i{  color:red !important;  }

._success {
    box-shadow: 0 15px 25px #1b1b1b;
    padding: 45px;
    width: 100%;
    text-align: center;
    margin: 40px auto;
    border-bottom: solid 4px #25D500;
}

._success i {
    font-size: 55px;
    color: #25D500;
}

._success h2 {
    margin-bottom: 12px;
    font-size: 40px;
    font-weight: 500;
    line-height: 1.2;
    margin-top: 10px;
}

._success p {
    margin-bottom: 0px;
    font-size: 18px;
    color: #1b1b1b;
    font-weight: 500;
}
</style>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="message-box _success">
                 <i class="fa fa-check-circle" aria-hidden="true"></i>
                <h2> Ваша оплата прошла успешно </h2>
               <p> Спасибо за покупку<br>
Вы будете перенаправлены на страницу для получения товара через <span id="timer"></span> секунд.</p>      
        </div> 
    </div> 
</div>
</div> 
</body>

<script>
    setTimeout(function(){
        @foreach($orderproducts as $orderproduct)
      window.location.href = "{{ route('render-orderproducts', $orderproduct->order_id) }}";
      @endforeach
    }, 5000); // время в миллисекундах (в данном случае 5000 мс = 5 секунд)
    
    var countdown = 5; // начальное время обратного отсчета в секундах
    var timer = setInterval(function(){
      document.getElementById('timer').innerHTML = countdown;
      countdown--;
      if (countdown < 0) {
        clearInterval(timer);
      }
    }, 1000); // интервал обновления таймера в миллисекундах (в данном случае 1000 мс = 1 секунда)
  </script>

</html>