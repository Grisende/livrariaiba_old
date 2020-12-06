@extends('layouts.layout')

@section('title', 'Compras')
    
@section('content')

    <header>
        <h2><i class="fas fa-cubes"></i> Compras</h2>
    </header>

    <div class="add-purchase">
        <a href="{{url('purchase/create')}}"><i class="fas fa-plus-circle"></i> Novo</a>
        <a href="{{url('purchaseExistingBook/create')}}"><i class="fas fa-plus-circle"></i> Existente</a>
    </div>

    <div class="purchase">
        <div class="table-content">
            <h2>Histórico</h2>
            <table class="table table-responsive ">
                @csrf
                <thead>
                    <tr>
                        <th scope="col">Código da Compra</th>
                        <th scope="col">Código do Produto</th>
                        <th scope="col">Título</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço de Compra</th>
                        <th scope="col">Preço de Venda</th>
                        <th scope="col">Loja</th>
                        <th scope="col">Método de Pagamento</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pedido</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase as $purchases)
                        @php
                            if ($purchases->payment_method == "money"){
                                $payment = "Dinheiro";
                            }
                            elseif($purchases->payment_method == "credit_card"){
                                $payment = "Cartão de Crédito";
                            }
                            elseif ($purchases->payment_method == "debt_card"){
                                $payment = "Cartão de Débito";
                            }
                            elseif ($purchases->payment_method == "billet"){
                                $payment = "boleto";
                            }

                            if ($purchases->status == "on_course"){
                                $status = "Em Trânsito";
                            }
                            elseif ($purchases->status == "delivered"){
                                $status = "Entregue";
                            }
                        @endphp
                        <tr>
                            <td scope="row">{{$purchases->id}}</td> 
                            <td scope="row">{{$purchases->id_book}}</td> 
                            <td scope="row">{{$purchases->title}}</td> 
                            <td scope="row">{{$purchases->quantity}}</td> 
                            <td scope="row">R$ {{$purchases->purchase_price}}</td> 
                            <td scope="row">R$ {{$purchases->selling_price}}</td> 
                            <td scope="row">{{$purchases->store}}</td>
                            <td scope="row">{{$payment ?? ''}}</td> 
                            <td scope="row">{{$status ?? ''}}</td> 
                            <td scope="row">{{$purchases->order}}</td> 
                            <td scope="row"><a href="{{url("purchase/$purchases->id/edit")}}"><i class="fas fa-pen"></i></a></td>
                            <td scope="row"><a href="{{url("purchase/$purchases->id")}}" class="js-del-purchase"><i class="fas fa-times"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    
@endsection