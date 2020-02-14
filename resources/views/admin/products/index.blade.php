@extends('layouts.app')


@section('content')
<a href="{{route('admin.products.create')}}" class="btn btn-warning mb-1">Cadastrar</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
            <td>{{$product->store->name}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-info mr-1">Editar</a>
                    <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-sm btn-danger" type="submit">Excluir</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$products->links()}}

@endsection
