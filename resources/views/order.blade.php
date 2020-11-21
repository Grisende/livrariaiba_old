@extends('layouts.layout')

@section('title', 'Encomendas')
    
@section('content')

    <header>
        <h2><i class="fas fa-shipping-fast"></i> Encomendas</h2>
    </header>

    <div class="add-order">
        <a href="{{url('order/create')}}"><i class="fas fa-plus-circle"></i> Novo</a>
    </div>

    <div class="order">
        <div class="table-content">
            <h2>Pedidos</h2>
            <table class="table table-responsive ">
                @csrf
                <thead>
                    <tr>
                        <th scope="col">Código do livro</th>
                        <th scope="col">Título</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Status</th>
                        <th scope="col">Observações</th>
                        <th scope="col">Criado em:</th>
                        <th scope="col">Atualizado em:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $orders)
                        @php
                            if ($orders->status == "on_course"){
                                $status = "Em Trânsito";
                            }
                            elseif ($orders ->status == "delivered"){
                                $status = "Entregue";
                            }
                        @endphp
                        <tr>
                            <td scope="row">{{$orders->id_book}}</td> 
                            <td scope="row">{{$orders->title}}</td> 
                            <td scope="row">{{$orders->quantity}}</td> 
                            <td scope="row">{{$orders->customer_name}}</td> 
                            <td scope="row">{{$status}}</td> 
                            <td scope="row">{{$orders->obs}}</td> 
                            <td scope="row">{{date_format($orders->created_at, 'd/m/Y H:i:s')}}</td> 
                            <td scope="row">{{date_format($orders->updated_at, 'd/m/Y H:i:s')}}</td> 
                            <td scope="row"><a href="{{url("order/$orders->id/edit")}}"><i class="fas fa-pen"></i></a></td>
                            <td scope="row"><a href="{{url("order/$orders->id")}}" class="js-del-order"><i class="fas fa-times"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    
@endsection