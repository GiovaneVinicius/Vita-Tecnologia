
<div class="modal fade" id="modalClientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="cadastrarE">Cadastrar</span> Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formClientes"  onsubmit="return false">
                @csrf
                <input type="hidden" name="tipo" value="" id="tipo">
                <div class="mb-3">
                    <label for="empresa" class="form-label">Empresa</label>
                    <input type="text" class="form-control" id="empresa" name="empresa" required placeholder="Nome da empresa">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="primeiro-nome" class="form-label">Primeiro Nome</label>
                        <input type="text" class="form-control" name="nome" required id="primeiro-nome"
                            placeholder="Seu primeiro nome">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" required id="sobrenome" placeholder="Seu sobrenome">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control sp_celphones" name="telefone" required id="telefone" placeholder="Seu telefone">
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" required id="endereco" placeholder="Endereço completo">
                </div>
                <div class="mb-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento"
                        placeholder="Complemento do endereço">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="estado"  id="estado" placeholder="Seu estado">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade" required id="cidade" placeholder="Sua cidade">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="postal" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" name="postal" id="postal" placeholder="Seu código postal">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pais" class="form-label">País</label>
                        <input type="text" class="form-control" name="pais" required id="pais" placeholder="Seu país">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="funcionario" class="form-label">Funcionário Responsável</label>
                    <select class="form-select" id="funcionario" name="funcionario">
                        <option value="" selected>Selecione um funcionário</option>\
                        @foreach ($funcionarios as $funcionario)
                            <option value="{{$funcionario['employeeNumber']}}">{{$funcionario['firstName']}} {{$funcionario['lastName']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" id="btnAction" class="btn btn-primary cadastrarE">Cadastrar</button>
            </form>
        </div>
      </div>
    </div>
  </div>