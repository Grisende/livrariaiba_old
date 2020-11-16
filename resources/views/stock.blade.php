@extends('layouts.layout')

@section('title', 'Estoque')
    
@section('content')

    <header>
        <h2><i class="fas fa-cubes"></i> Estoque</h2>
    </header>

    <div class="add-book">
        <a href="{{url('stock/create')}}"><i class="fas fa-plus-circle"></i> Adicionar</a>
    </div>

    <div class="stock">
        <div class="table-content">
            <h2>Produtos</h2>
            <table class="table table-responsive ">
                @csrf
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Título</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço de Compra</th>
                        <th scope="col">Preço de Venda</th>
                        <th scope="col">Criado em:</th>
                        <th scope="col">Atualizado em:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $books)
                        <tr>
                            <td scope="row">{{$books->id}}</td> 
                            <td scope="row">{{$books->title}}</td> 
                            <td scope="row">{{$books->quantity}}</td> 
                            <td scope="row">R$ {{$books->purchase_price}}</td> 
                            <td scope="row">R$ {{$books->selling_price}}</td> 
                            <td scope="row">{{date_format($books->created_at, 'd/m/Y H:i:s')}}</td> 
                            <td scope="row">{{date_format($books->updated_at, 'd/m/Y H:i:s')}}</td> 
                            <td scope="row"><a href="{{url("stock/$books->id/edit")}}"><i class="fas fa-pen"></i></a></td>
                            <td scope="row"><a href="{{url("stock/$books->id")}}" class="js-del-book"><i class="fas fa-times"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    
@endsection