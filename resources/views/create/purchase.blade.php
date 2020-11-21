@extends('layouts.layout')

@section('title', 'Adicionar Compra')

@section('content')

    <header>
        <h2>
        @if (isset($purchase))<i class="far fa-edit"></i> Editar Compra @else <i
                    class="fas fa-book-medical"></i> Nova Compra @endif
        </h2>
    </header>

    <div class="cancel-purchase-add">
        <a href="{{ url('purchase') }}"><i class="far fa-window-close"></i></i> Cancelar</a>
    </div>

    <div class="create-purchase">
        @if (isset($purchase))
            <form class="inline-form" method="POST" action="{{ url("purchase/$purchase->id") }}">
                @method('PUT')
                @php
                if ($purchase->payment_method == "money"){
                $payment = "Dinheiro";
                }
                elseif($purchase->payment_method == "credit_card"){
                $payment = "Cartão de Crédito";
                }
                elseif ($purchase->payment_method == "debt_card"){
                $payment = "Cartão de Débito";
                }
                elseif ($purchase->payment_method == "billet"){
                $payment = "boleto";
                }
                @endphp
            @else
                <form class="inline-form" method="POST" action="{{ url('purchase') }}">
        @endif
        @csrf
        <div class="row">
            <div class="col">
                <label for="title">Título do Livro</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $purchase->title ?? '' }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <label for="purchase_price">Preço de Compra</label>
                <input type="text" class="form-control money2" id="purchase_price" name="purchase_price" value="{{ $purchase->purchase_price ?? '' }}" required>
            </div>
            <div class="col-5">
                <label for="purchase_price">Preço de Venda</label>
                <input type="text" class="form-control money2" id="selling_price" name="selling_price" value="{{ $purchase->selling_price ?? '' }}" required>
            </div>
            <div class="col-2">
                <label for="quantity">Quantidade</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $purchase->quantity ?? '' }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <label for="payment_method">Método de Pagamento</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="{{ $purchase->payment_method ?? '' }}">{{ $payment ?? '' }}</option>
                    <option value="money">Dinheiro</option>
                    <option value="credit_card">Cartão de Crédito</option>
                    <option value="debt_card">Cartão de Débito</option>
                    <option value="billet">Boleto</option>
                </select>
            </div>
            <div class="col-8">
                <label for="store">Loja</label>
                <input type="text" class="form-control" id="store" name="store" value="{{ $purchase->store ?? '' }}"  required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="order">Pedido</label>
                <input type="text" class="form-control" id="order" name="order" value="{{ $purchase->order ?? '' }}" required>
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

        <div class="form-group text-center">
            <button class="btn btn-primary"> Salvar</button>
        </div>
        </form>
    </div>

@endsection
