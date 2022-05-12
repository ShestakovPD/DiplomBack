

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/libs.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">
    {{ Html::style('css/libs.min.css') }}
    {{ Html::style('css/main.css') }}
    {{ Html::style('css/media.css') }}
    {{ Html::style('css\vendor\fontaw\css\font-awesome.min.css') }}
</head>
<body>
    <div class="main-wrapper">
    <header>
        @include('site.header')
    </header>
        <div class="middle">
        @include('site.sidebar')
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск,
                    скачать Steam игры после оплаты
                </div>
                <div class="sliders"><img src=" {{URL::asset('img/slider.png')}}  " alt="Image" class="image-main"></div>
            </div>
        @include('site.content')
                <div class="content-bottom"></div>
            </div>
        </div>
        @include('site.footer')
    </div>
<script src="js/main.js"></script>
</body>
</html>


