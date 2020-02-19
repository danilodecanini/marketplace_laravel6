@extends('layouts.app')


@section('content')

@if (!$store)
    <a href="{{route('admin.stores.create')}}" class="btn btn-warning mb-1">Cadastrar</a>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de Produtos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if($store)
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-info mr-1">Editar</a>
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger" type="submit">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>
@endif

@endsection
