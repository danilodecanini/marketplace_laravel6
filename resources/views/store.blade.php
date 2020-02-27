@extends('layouts.front')

@section('content')
<div class="row front">
        <div class="col-4">
            @if ($store->logo)
            <img src="{{asset('storage/' . $store->logo)}}" alt="{{$store->name}}" class="img-fluid">
            @else
            <img src="https://via.placeholder.com/600X300.png?text=logo" class="img-fluid" alt="Sem logo">
            @endif
        </div>
        <div class="col-8">
            <h2>{{$store->name}}</h2>
            <p>{{$store->description}}</p>
            <p>
                <h4>Contatos:</h4>
                <span>{{$store->phone}}</span>
            </p>
        </div>
    <div class="col-12">
        <hr>
        <h3 class="mb-5">Produtos desta loja:</h3>

    </div>
    @if ($store->products->count())
    @foreach ($store->products as $key => $product)
    <div class="col-md-4">
        <div class="card" style="width: 98%;">
            @if ($product->photos->count())
            <img src="{{asset('storage/'. $product->photos->first()->image)}}" class="card-img-top"
                alt="{{$product->name}}">
            @else
            <img src="{{asset('assets/img/no-photo.jpg')}}" class="card-img-top" alt="Sem Foto">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <p class="card-text">
                    {{$product->description}}
                </p>
                <h3>
                    R$ {{number_format($product->price, '2', ',', '.')}}
                </h3>
                <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success">
                    Ver Produto
                </a>
            </div>
        </div>
    </div>
    @if (($key + 1) % 3 == 0)
</div>
<div class="row front"> @endif

    @endforeach
    @else
    <div class="col-12">
        <h3 class="alert alert-warning">
            Nenhum produto na loja {{$store->name}}
        </h3>
    </div>
    @endif
</div>
@endsection
