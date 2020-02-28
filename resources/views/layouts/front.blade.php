<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .front.row {
            margin-bottom: 40px;
        }
    </style>
    @yield('stylesheets')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 40px;">

        <a class="navbar-brand" href="{{route('home')}}">Marketplace L6</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>

                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('category/' . $category->slug)) active @endif" href="{{route('category.single', ['slug' => $category->slug])}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>

            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item @if(request()->is('/my-orders')) active @endif">
                            <a href="{{route('user.orders')}}" class="nav-link">Meus Pedidos</a>
                        </li>                        
                    @endauth
                    <li class="nav-item">
                        <a href="{{route('cart.index')}}" class="nav-link">
                            @if (session()->has('cart'))
                            <div class="badge badge-danger">{{count(session()->get('cart'))}}</div>
                            @endif
                            <i class="fa fa-shopping-cart "></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
			  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
			  crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>

</html>
