@extends('layouts.app')

@section('content')
<h1>Atualizar Loja</h1>
<form action="{{route('admin.stores.store', ['store' => $store->id])}}" method="POST">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="name">Nome da Loja</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$store->name}}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" class="form-control" value="{{$store->description}}">
    </div>

    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{$store->phone}}">
    </div>

    <div class="form-group">
        <label for="mobile_phone">Celular</label>
        <input type="text" name="mobile_phone" id="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{$store->slug}}">
    </div>
    <div>
        <button class="btn btn-lg btn-success" type="submit">Atualizar Loja</button>
    </div>
</form>

@endsection
