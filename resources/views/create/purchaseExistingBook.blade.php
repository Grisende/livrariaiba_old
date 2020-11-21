@extends('layouts.layout')

@section('title', 'Adicionar Compra')
    
@section('content')

    <header>
        <h2><i class="fas fa-book-medical"></i> Nova Compra</h2>
    </header>

    <div class="cancel-purchase-add">
        <a href="{{url('purchase')}}"><i class="far fa-window-close"></i></i> Cancelar</a>
    </div>

    <div class="create-purchase">
            <form class="inline-form" method="POST" action="{{url('purchaseExistingBook')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="id_book">Código do Livro</label>
                    <input type="text" class="form-control autocomplete" id="id_book" name="id_book" required>
                </div>
                <div class="col">
                    <label for="quantity">Quantidade</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                  <label for="payment_method">Método de Pagamento</label>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value=""></option>
                        <option value="money">Dinheiro</option>
                        <option value="credit_card">Cartão de Crédito</option>
                        <option value="debt_card">Cartão de Débito</option>
                        <option value="billet">Boleto</option>
                    </select>
                </div>
                <div class="col-8">
                    <label for="store">Loja</label>
                    <input type="text" class="form-control" id="store" name="store" value="{{$purchase->store ?? ''}}" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="order">Pedido</label>
                      <input type="text" class="form-control" id="order" name="order" value="{{$purchase->order ?? ''}}" required>
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