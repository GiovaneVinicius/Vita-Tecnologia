// capturar o evento de clique do botão "editar"

$('.editar').click(function () {

    // obter a linha da tabela onde o botão foi clicado
    var linha = $(this).closest('tr');
    $('#modalProdutos').modal('show');

    $('.cadastrarE').text('Atualizar');
    // recuperar os dados na linha com as classes correspondentes
    var id = linha.find('.productCode').text();
    var productName = linha.find('.productName').text();
    var productLine = linha.find('.productLine').text();
    var productVendor = linha.find('.productVendor').text();
    var product_description = linha.find('.product_description').text();
    var quantityInStock = linha.find('.quantityInStock').text();
    var buyPrice = linha.find('.buyPrice').text();
    var MSRP = linha.find('.MSRP').text();
    var productScale = linha.find('[data-productscale]').data('productscale');

    var productDescription = $('#'+id).text();


    // preencher os campos do formulário com esses dados
    $('#tipo').val(id);
    $('#productName').val(productName);
    $('#productLine').val(productLine);
    $('#productVendor').val(productVendor);
    $('#quantityInStock').val(quantityInStock);
    $('#buyPrice').val(buyPrice);
    $('#MSRP').val(MSRP);
    $('#productScale').val(productScale);
    $('#productDescription').val(productDescription);

});

$('#modalProdutos').on('hidden.bs.modal', function () {
    // redefinir todos os campos do formulário para seus valores padrão
    $('#formProdutos')[0].reset();
    $('.cadastrarE').text('Cadastrar');
});


$('#formProdutos').submit(function (event) {
    // evitar que o formulário seja enviado da maneira convencional
    event.preventDefault();

    // serializar os dados do formulário
    var dados = $(this).serialize();

    // enviar a requisição AJAX
    $.ajax({
        url: '/produtos',
        type: 'POST',
        data: dados,
        complete: function (response) {
            document.getElementById("btnAction").disabled = true;
        },
        success: function (response) {
            // lidar com a resposta do servidor
            if (response) {

                Swal.fire({
                    icon: 'success',
                    toast: true,
                    title: 'Sucesso',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2500,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                setTimeout(function () {
                    location.reload();
                }, 2300);


            } else {
                const btn = document.getElementById('btnAction');
                btn.removeAttribute('disabled');

                Swal.fire({
                    icon: 'error',
                    title: 'Ops..',
                    text: 'Ocorreu um erro ao realizar essa ação',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2500,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        },
        error: function (error) {
            // lidar com erros de requisição
            console.log(error);
        }
    });
});



$('.excluir').click(function () {

    var linha = $(this).closest('tr');
    var id = linha.find('.productCode').text();

    Swal.fire({
        title: 'Desseja realmente excluir?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar',
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: '/produtosDeletar',
                type: 'POST',
                data: {
                    id: id,
                    _token: $("[name='_token']").val()
                },

                success: function (response) {
                    // lidar com a resposta do servidor
                    if (response) {

                        Swal.fire({
                            icon: 'success',
                            toast: true,
                            title: 'Deletado com sucesso',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 2500,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 2300);
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Ops..',
                            text: 'Ocorreu um erro ao realizar essa ação',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 2500,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 2300);
                    }
                },
                error: function (error) {
                    // lidar com erros de requisição
                    console.log(error);
                }
            });
        }
    })
});