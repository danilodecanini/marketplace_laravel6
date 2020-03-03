<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace Laravel 6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="{{route('home')}}">Marketplace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('admin/orders*')) active @endif">
                        <a class="nav-link" href="{{route('admin.orders.my')}}">Meus Pedidos @if(request()->is('admin/stores')) <span class="sr-only">(current)</span> @endif </a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                        <a class="nav-link" href="{{route('admin.stores.index')}}">Loja @if(request()->is('admin/stores')) <span class="sr-only">(current)</span> @endif </a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos @if(request()->is('admin/products')) <span class="sr-only">(current)</span> @endif </a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias @if(request()->is('admin/categories')) <span class="sr-only">(current)</span> @endif </a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.notifications.index')}}">
                                <span class="badge badge-danger">{{auth()->user()->unreadnotifications->count()}}</span>
                                <i class="fa fa-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                            <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">{{auth()->user()->name}}</span>
                        </li>
                    </ul>
                </div>

            @endauth
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
</body>

</html>
