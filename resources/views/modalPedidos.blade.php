
<div class="modal fade" id="modalPedidos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="cadastrarE">Cadastrar</span> Pedido</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formPedidos"  onsubmit="return false">
                @csrf
                <input type="hidden" name="tipo" value="" id="tipo">
                <div class="row">
                    <div class="mb-3">
                        <label for="customerNumber" class="form-label">Cliente</label>
                        <select class="form-control" id="customerNumber" name="customerNumber" required>
                          <option value="">Selecione um cliente</option>
                          <!-- Aqui deve ser inserido o código para gerar as opções dinamicamente -->
                        </select>
                      </div>
                      <div class="mb-3 col-lg-6 col-md-12">
                        <label for="orderDate" class="form-label">Data do pedido</label>
                        <input type="date" class="form-control" name="orderDate" required id="orderDate">
                      </div>
                      <div class="mb-3 col-lg-6 col-md-12">
                        <label for="requiredDate" class="form-label">Data requerida</label>
                        <input type="date" class="form-control" name="requiredDate" required id="requiredDate">
                      </div>
                      <div class="mb-3 col-lg-6 col-md-12">
                        <label for="shippedDate" class="form-label">Data de envio</label>
                        <input type="date" class="form-control" name="shippedDate" id="shippedDate">
                      </div>
                      <div class="mb-3 col-lg-6 col-md-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                          <option value="">Selecione um status</option>
                          <option value="em_processamento">Em processamento</option>
                          <option value="enviado">Enviado</option>
                          <option value="entregue">Entregue</option>
                          <option value="cancelado">Cancelado</option>
                        </select>
                      </div>
                      <div class="col-12 d-flex align-items-center justify-content-center mb-3">
                        <p class="m-0">Produtos</p>
                        <div class="divisor"></div>
                      </div>
                      <div class="mb-3 col-lg-6 col-md-12">
                        <label for="productCode" class="form-label">Código do produto</label>
                        <select class="form-control" id="productCode" name="productCode" required>
                          <option value="">Selecione um produto</option>
                          <!-- Aqui deve ser inserido o código para gerar as opções dinamicamente -->
                        </select>
                      </div>
                      <div class="mb-3 col-lg-6 col-md-12">
                        <label for="quantityOrdered" class="form-label">Quantidade encomendada</label>
                        <input type="number" class="form-control" name="quantityOrdered" required id="quantityOrdered">
                      </div>
                      <div class="mb-3">
                        <label for="comments" class="form-label">Comentários</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                      </div>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" id="btnAction" class="btn btn-primary cadastrarE">Cadastrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>