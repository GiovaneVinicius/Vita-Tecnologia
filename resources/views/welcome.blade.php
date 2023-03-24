
@extends('master')
@section('content') 
    <section class="customers">
        @include('modalClientes')
        <div class="container">
            <div class="glass">
                <div class="top_info">
                    <h2 class="page_title">Clientes</h2>
                    <a data-bs-toggle="modal" data-bs-target="#modalClientes"><i class="fa-regular fa-plus"></i></a>
                </div>                
                
                <table id="customers" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Responsável</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td class="id">{{$cliente['customerNumber']}}</td>
                            <td class="empresa">{{$cliente['customerName']}}</td>
                            <td><span class="primeiro-nome">{{$cliente['contactFirstName']}}</span> <span class="sobrenome">{{$cliente['contactLastName']}}</span></td>
                            <td class="telefone">{{$cliente['phone']}}</td>
                            <td>
                                <span class="endereco">{{$cliente['addressLine1']}}</span> <span class="complemento">{{$cliente['addressLine2']}}</span> <span class="cidade">{{$cliente['city']}}</span> - <span class="estado">{{$cliente['state']}}</span> - <span class="pais">{{$cliente['country']}}</span>
                            </td>
                            <td>{{date('d/m/Y', strtotime($cliente['created_at']))}}</td>
                            <td data-postalcode='{{$cliente["postalCode"]}}' data-salesrepemployeenumber='{{$cliente["salesRepEmployeeNumber"]}}' class="acoes">
                                <a href="#" class="editar" title="Editar"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="#" class="excluir" title="Excluir"><i class="fa-regular fa-x"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Responsável</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Data</th>
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
