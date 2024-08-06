<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="15;url={{ route('render-home') }}" />
    <title>{{$title}}</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/favicon.png') }}">
</head>
<style>
    ._failed{ border-bottom: solid 4px red !important; }
._failed i{  color:red !important;  }

._success {
    box-shadow: 0 15px 25px #00000019;
    padding: 45px;
    width: 100%;
    text-align: center;
    margin: 40px auto;
    border-bottom: solid 4px #28a745;
}

._success i {
    font-size: 55px;
    color: #28a745;
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
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="message-box _success _failed">
                 <i class="fa fa-times-circle" aria-hidden="true"></i>
                <h2> Ваша оплаты не прошла </h2>
         <p>  Попробуйте снова</p> 
     
        </div> 
    </div> 
</div> 
</body>
</html>