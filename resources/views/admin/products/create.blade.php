@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nome do Produto</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">

        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror">

        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="body">Conteúdo</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{old('body')}}</textarea>

        @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Preço</label>
        <input type="text" name="price" id="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">

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
                <option value="{{$category->id}}">{{$category->name}}</option>
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

    <div>
        <button class="btn btn-lg btn-success" type="submit">Criar Produto</button>
    </div>
</form>

@endsection
