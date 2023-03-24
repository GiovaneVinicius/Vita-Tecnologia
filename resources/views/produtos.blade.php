
@extends('master')
@section('content') 
    <section class="produtos">
        @include('modalProdutos')
        @foreach ($produtos as $p)
            <div class="modal fade" id="Modal{{$p['productCode']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="Modal{{$p['productCode']}}Label">{{$p['productName']}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="{{$p['productCode']}}">{{$p['productDescription']}}</div>
                </div>
                </div>
            </div>
        @endforeach
        <div class="container">
            <div class="glass">
                <div class="top_info">
                    <h2 class="page_title">Produtos</h2>
                    <a data-bs-toggle="modal" data-bs-target="#modalProdutos"><i class="fa-regular fa-plus"></i></a>
                </div>   
                
                <table id="produtos" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all"></th>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Fornecedor</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Custo</th>
                            <th>Preço sugerido</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $prod)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td class="productCode">{{$prod['productCode']}}</td>
                            <td class="productName">{{$prod['productName']}}</td>
                            <td class="productLine">{{$prod['productLine']}}</td>
                            <td class="productVendor">{{$prod['productVendor']}}</td>
                            <td class="d-flex justify-content-center product_description"><a data-bs-toggle="modal" data-bs-target="#Modal{{$prod['productCode']}}"><i class="fa-solid fa-list-ul"></i></a></td>                            
                            <td class="quantityInStock">{{$prod['quantityInStock']}}</td>
                            <td class="buyPrice">{{$prod['buyPrice']}}</td>
                            <td class="MSRP">{{$prod['MSRP']}}</td>
                            <td class="data">{{date('d/m/Y', strtotime($prod['created_at']))}}</td>
                            <td data-productscale="{{$prod->productScale}}" class="acoes">
                                <a class="editar"  title="Editar"> <i class="fa-regular fa-pen-to-square"> </i> </a>
                                <a class="excluir" title="Excluir"> <i class="fa-regular fa-x" ></i> </a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Fornecedor</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Custo</th>
                            <th>Preço sugerido</th>
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
<script src="/public/js/produto.js"></script>
<script>
    // Get the checkbox that will trigger the selection
    var selectAllCheckbox = document.getElementById('select_all');

    // Add an event listener to the checkbox
    selectAllCheckbox.addEventListener('click', function() {
    // Get all the checkboxes on the page
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    // Loop through each checkbox and set the 'checked' property to true
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
    });
</script>
@stop
