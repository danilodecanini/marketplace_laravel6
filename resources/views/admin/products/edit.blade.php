@extends('layouts.app')

@section('content')
<h1>Atualizar Produto</h1>
<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="name">Nome da Loja</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" class="form-control" value="{{$product->description}}">
    </div>

    <div class="form-group">
        <label for="phone">Conteúdo</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$product->body}}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Celular</label>
        <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{$product->slug}}">
    </div>
    <div>
        <button class="btn btn-lg btn-success" type="submit">Atualizar Produto</button>
    </div>
</form>

@endsection
