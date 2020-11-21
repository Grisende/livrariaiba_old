@extends('layouts.layout')

@section('title', 'Adicionar Pedido')
    
@section('content')

    <header>
        <h2>@if(isset($order))<i class="far fa-edit"></i> Editar Pedido @else <i class="fas fa-book-medical"></i> Novo Pedido @endif </h2>
    </header>

    <div class="cancel-order-add">
        <a href="{{url('order')}}"><i class="far fa-window-close"></i></i> Cancelar</a>
    </div>

    <div class="create-order">
        @if (isset($order))
            <form method="POST" action="{{url("order/$order->id")}}">
                @method('PUT')
        @else
            <form method="POST" action="{{url('order')}}">
        @endif
            @csrf
            <div class="row">
                <div class="col-3">
                    <label for="id_book">Código</label>
                    <input type="text" class="form-control" id="id_book" name="id_book" value="{{$order->id_book ?? ''}}" required>
                </div>
                <div class="col-9">
                    <label for="customer_name">Cliente</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$order->customer_name ?? ''}}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="quantity">Quantidade</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$order->quantity ?? ''}}" required>
                </div>
                <div class="col">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value=""></option>
                        <option value="on_course">Em Trânsito</option>
                        <option value="delivered">Entregue</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="obs">Observações</label>
                    <textarea class="form-control" id="obs" name="obs">{{$order->obs ?? ''}}</textarea>
                </div>
            </div>
            
            <div class="form-group text-center">
                <button class="btn btn-primary"> Salvar</button>
            </div>
          </form>
    </div>
    
@endsection