@extends('layouts.app')

@section('content')
<h1>Atualizar Produto</h1>
<form action="{{route('admin.products.update', ['product' => $product->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="name">Nome da Loja</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}">

        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="body">Conteúdo</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>

        @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Celular</label>
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">

        @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="categories">Categorias</label>
        <select name="categories[]" id="categories" class="form-control" multiple>
            @foreach ($categories as $category)
                <option value="{{$category->id}}"
                    @if ($product->categories->contains($category)) selected="true" @endif
                >{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="photos">Fotos do Produto</label>
        <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
        @error('photos')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{$product->slug}}">
    </div>
    <div>
        <button class="btn btn-lg btn-success" type="submit">Atualizar Produto</button>
    </div>
</form>

<hr>

<div class="row">
    @foreach ($product->photos as $photo)
        <div class="col-4 text-center">
            <img src="{{ asset('storage/'. $photo->image)}}" alt="" class="img-fluid">
            <form action="{{route('admin.photo.remove', ['photoName' => $photo->image])}}" method="POST">
                @csrf
                <input type="hidden" name="photoName" value="{{$photo->image}}">
                <button type="submit" class="btn btn-lg btn-danger">X</button>
            </form>
        </div>
    @endforeach
</div>

@endsection
