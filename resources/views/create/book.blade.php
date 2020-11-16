@extends('layouts.layout')

@section('title', 'Adicionar Livro')
    
@section('content')

    <header>
        <h2>@if(isset($book))<i class="far fa-edit"></i> Editar Livro @else <i class="fas fa-book-medical"></i> Novo Livro @endif </h2>
    </header>

    <div class="cancel-book-add">
        <a href="{{url('stock')}}"><i class="far fa-window-close"></i></i> Cancelar</a>
    </div>

    <div class="create-book">
        @if (isset($book))
            <form method="POST" action="{{url("stock/$book->id")}}">
                @method('PUT')
        @else
            <form method="POST" action="{{url('stock')}}">
        @endif
            @csrf
            <div class="form-group">
              <label for="title">Título do Livro</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$book->title ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="purchase_price">Preço de Compra</label>
                <input type="text" class="form-control" id="purchase_price" name="purchase_price" value="{{$book->purchase_price ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="purchase_price">Preço de Venda</label>
                <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{$book->selling_price ?? ''}}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="text" type="number" class="form-control" id="quantity" name="quantity" value="{{$book->quantity ?? ''}}" required>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary"> Salvar</button>
            </div>
          </form>
    </div>
    
@endsection