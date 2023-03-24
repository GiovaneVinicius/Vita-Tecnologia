
<div class="modal fade" id="modalProdutos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="cadastrarE">Cadastrar</span> Produto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formProdutos"  onsubmit="return false">
                @csrf
                <input type="hidden" name="tipo" value="" id="tipo">
                <div class="row">                    
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nome do produto</label>
                        <input type="text" class="form-control" id="productName" name="productName" required placeholder="Nome do produto">
                    </div>
                    <div class="mb-3">
                        <label for="productLine" class="form-label">Linha do produto</label>
                        <select name="productLine" class="form-control" id="productLine" required>
                            <option value="" selected>Selecione...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->productLine}}">{{$categoria->productLine}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productScale" class="form-label">Escala do produto</label>
                        <input type="text" class="form-control" id="productScale" name="productScale" required placeholder="Escala do produto">
                    </div>
                    <div class="mb-3">
                        <label for="productVendor" class="form-label">Fornecedor do produto</label>
                        <input type="text" class="form-control" id="productVendor" name="productVendor" required placeholder="Fornecedor do produto">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="productDescription" class="form-label">Descrição do produto</label>
                        <textarea name="productDescription" class="form-control" id="productDescription" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-3 col--12">
                        <label for="quantityInStock" class="form-label">Quantidade em estoque</label>
                        <input type="number" class="form-control" id="quantityInStock" name="quantityInStock" required placeholder="Quantidade em estoque">
                    </div>
                    <div class="mb-3 col-lg-6 col-md-12">
                        <label for="buyPrice" class="form-label">Preço de compra</label>
                        <input type="text" class="form-control" id="buyPrice" name="buyPrice" required placeholder="Preço de compra">
                    </div>
                    <div class="mb-3 col-lg-6 col-md-12">
                        <label for="MSRP" class="form-label">Preço de venda sugerido</label>
                        <input type="text" class="form-control" id="MSRP" name="MSRP" required placeholder="Preço de venda sugerido">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" id="btnAction" class="btn btn-primary cadastrarE">Cadastrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>