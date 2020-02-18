@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="name">Nome da Loja</label>
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
        <label for="phone">Telefone</label>
        <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">

        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="mobile_phone">Celular</label>
        <input type="text" name="mobile_phone" id="mobile_phone" value="{{old('mobile_phone')}}" class="form-control @error('mobile_phone') is-invalid @enderror">

        @error('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="photos">Logo</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
        @error('photos')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control">
    </div>

    <div>
        <button class="btn btn-lg btn-success" type="submit">Criar Loja</button>
    </div>
</form>

@endsection
