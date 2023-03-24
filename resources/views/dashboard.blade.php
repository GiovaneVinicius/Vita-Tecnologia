
@extends('master')
@section('content') 
    <section class="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="glass">
                        <div class="d-flex justify-content-around align-items-center">
                            <i class="fa-solid fa-user-group"></i>
                            <div>
                                <h3>Clientes</h3>
                                <p>{{$clientes}}</p>
                            </div>
                        </div>                         
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="glass">
                        <div class="d-flex justify-content-around align-items-center">
                            <i class="fa-solid fa-box-archive"></i>
                            <div>
                                <h3>Produtos</h3>
                                <p>{{$produtos}}</p>
                            </div>
                        </div>                         
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="glass">
                        <div class="d-flex justify-content-around align-items-center">
                            <i class="fa-solid fa-boxes-packing"></i>
                            <div>
                                <h3>Pedidos</h3>
                                <p>{{$pedidos}}</p>
                            </div>
                        </div>                         
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 mb-4">
                    <div class="glass">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 mb-4">
                    <div class="glass">
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@stop
@section('scripts')
<script src="/public/js/clientes.js"></script>
@stop
