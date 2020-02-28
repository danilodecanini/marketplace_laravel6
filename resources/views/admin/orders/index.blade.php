@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Pedidos Recebidos</h2>
        <hr>
    </div>

    <div class="col-12">
        <div id="accordion">
            @forelse ($orders as $key => $order)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$key}}"
                            aria-expanded="true" aria-controls="collapseOne">
                            Pedido número: {{$order->reference}}
                        </button>
                    </h5>
                </div>

                <div id="collapse{{$key}}" class="collapse @if ($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            @php $items = unserialize($order->items) @endphp
                            @foreach (filterItemsByStoreId($items, auth()->user()->stores->id) as $item)
                            
                                <li>
                                    {{$item['name']}} | {{number_format($item['price'], 2, ',', '.')}}
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
                @empty
                    <div class="alert alert-warning">Nenhum pedido recebido!</div>
            @endforelse
            <div class="col-12">
                <hr>
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
