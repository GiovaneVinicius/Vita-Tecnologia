
@extends('master')
@section('content') 
    <section class="pedidos">
        @include('modalPedidos')
        <div class="container">
            <div class="glass">
                <div class="top_info">
                    <h2 class="page_title">Pedidos</h2>
                    <a data-bs-toggle="modal" data-bs-target="#modalPedidos"><i class="fa-regular fa-plus"></i></a>
                </div>   
                
                <table id="pedidos" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data Pedido</th>
                            <th>Previsão de entrega</th>
                            <th>Data de envio</th>
                            <th>Status</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $ped)
                        <tr>
                            <td class="orderNumber">{{$ped['orderNumber']}}</td>
                            <td class="orderDate">{{date('d/m/Y', strtotime($ped['orderDate']))}}</td>
                            <td class="requiredDate">{{date('d/m/Y', strtotime($ped['requiredDate']))}}</td>
                            <td class="shippedDate">{{ $ped['shippedDate'] != null ? date('d/m/Y', strtotime($ped['shippedDate'])) : 'Não enviado'}}</td>
                            <td class="status">{{$ped['status']}}</td>
                            <td class="comments" title="{{$ped['comments']}}">{{$ped['comments'] != '' ? $ped['comments'] : '...'}}</td>
                            <td class="acoes">
                                <a href="#" title="Imprimir PDF"><i class="fa-regular fa-file-pdf"></i></a>
                                <a href="#" title="Editar"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="#" title="Excluir"><i class="fa-regular fa-x"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Data Pedido</th>
                            <th>Previsão de entrega</th>
                            <th>Data de envio</th>
                            <th>Status</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@stop
@section('scripts')
<script src="/public/js/clientes.js"></script>
@stop
