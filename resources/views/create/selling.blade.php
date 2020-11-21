@extends('layouts.layout')

@section('title', 'Adicionar Venda')

@section('content')

    <header>
        <h2>
            @if (isset($selling))<i class="far fa-edit"></i> Editar Venda @else <i class="fas fa-book-medical"></i> Nova Venda @endif
        </h2>
    </header>

    <div class="cancel-selling-add">
        <a href="{{ url('selling') }}"><i class="far fa-window-close"></i></i> Cancelar</a>
    </div>

    <div class="create-selling">
        @if (isset($selling))
            <form class="inline-form" method="POST" action="{{ url("selling/$selling->id") }}">
                @method('PUT')
                @php
                if ($selling->payment_method == "money"){
                $payment = "Dinheiro";
                }
                elseif($selling->payment_method == "credit_card"){
                $payment = "Cartão de Crédito";
                }
                elseif ($selling->payment_method == "debt_card"){
                $payment = "Cartão de Débito";
                }
                elseif ($selling->payment_method == "billet"){
                $payment = "boleto";
                }
                @endphp
            @else
                <form class="inline-form" method="POST" action="{{ url('selling') }}">
        @endif
        @csrf
        <div class="row">
            <div class="col-3">
                <label for="id_book">Código do Livro</label>
                <input type="text" class="form-control" id="id_book" name="id_book" value="{{ $selling->id_book ?? '' }}" required>
            </div>
        </div>

        <div class="row">
            
        </div>

        <div class="row">
            <div class="col-3">
                <label for="quantity">Quantidade</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $selling->quantity ?? '' }}" required>
            </div>
            <div class="col-3">
                <label for="payment_method">Pagamento</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="{{ $selling->payment_method ?? '' }}">{{ $payment ?? '' }}</option>
                    <option value="money">Dinheiro</option>
                    <option value="credit_card">Cartão de Crédito</option>
                    <option value="debt_card">Cartão de Débito</option>
                    <option value="billet">Boleto</option>
                    <option value="debt">Fiado</option>
                </select>
            </div>
            <div class="col-6">
                <label for="customer_name">Cliente</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $selling->customer_name ?? '' }}"  required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="obs">Observações</label>
                <textarea class="form-control" id="obs" name="obs">{{ $selling->obs ?? '' }}</textarea>
            </div>
        </div>

        <div class="form-group text-center">
            <button class="btn btn-primary"> Salvar</button>
        </div>
        </form>
    </div>

@endsection
