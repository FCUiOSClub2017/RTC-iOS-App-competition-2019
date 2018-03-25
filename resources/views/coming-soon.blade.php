@if(App::environment('server')) @php $route_prefix = '/app2018'; @endphp @endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Coming Soon') }}</title>
    <script src="{{$route_prefix}}/js/coming-soon.js" defer></script>
    <link href="{{$route_prefix}}/css/coming-soon.css" rel="stylesheet">
</head>

<body>
    <div class="overlay"></div>
    <div class="masthead">
        <div class="masthead-bg"></div>
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto">
                    <div class="masthead-content text-white py-5 py-md-0">
                        <h1 class="mb-4">Coming Soon!</h1>
                        <h2> 2018 </h2>
                        <h3> APP移動應用創新賽 </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-icons">
        <ul class="list-unstyled text-center mb-0">
            <li class="list-unstyled-item">
                <a href="http://www.fcu.edu.tw/"><img width="70%" src="{{$route_prefix}}/svg/fcu.svg" alt="FCU Official Website"></a>
            </li>
            <li class="list-unstyled-item">
                <a href="https://www.facebook.com/FCURTC"><i class="fab fa-apple"></i></a>
            </li>
            <li class="list-unstyled-item">
                <a href="https://iosclub.tw"><img width="50%" src="{{$route_prefix}}/svg/iosclub.svg" alt="FCU iOSClub Official Website"></a>
            </li>
        </ul>
    </div>
</body>

</html>