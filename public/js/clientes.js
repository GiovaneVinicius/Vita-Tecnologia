// capturar o evento de clique do botão "editar"
$('.editar').click(function () {
    // obter a linha da tabela onde o botão foi clicado
    var linha = $(this).closest('tr');
    $('#modalClientes').modal('show');

    $('.cadastrarE').text('Atualizar');
    // recuperar os dados na linha com as classes correspondentes
    var id = linha.find('.id').text();
    var empresa = linha.find('.empresa').text();
    var primeiroNome = linha.find('.primeiro-nome').text();
    var sobrenome = linha.find('.sobrenome').text();
    var telefone = linha.find('.telefone').text();
    var endereco = linha.find('.endereco').text();
    var complemento = linha.find('.complemento').text();
    var estado = linha.find('.estado').text();
    var cidade = linha.find('.cidade').text();
    var postal = linha.find('[data-postalcode]').data('postalcode');
    var pais = linha.find('.pais').text();
    var funcionario = linha.find('[data-salesrepemployeenumber]').data('salesrepemployeenumber');

    // preencher os campos do formulário com esses dados
    $('#tipo').val(id);
    $('#empresa').val(empresa);
    $('#primeiro-nome').val(primeiroNome);
    $('#sobrenome').val(sobrenome);
    $('#telefone').val(telefone);
    $('#endereco').val(endereco);
    $('#complemento').val(complemento);
    $('#estado').val(estado);
    $('#cidade').val(cidade);
    $('#postal').val(postal);
    $('#pais').val(pais);
    $('#funcionario').val(funcionario);
});

$('#modalClientes').on('hidden.bs.modal', function () {
    // redefinir todos os campos do formulário para seus valores padrão
    $('#formClientes')[0].reset();
    $('.cadastrarE').text('Cadastrar');
});


$('#formClientes').submit(function (event) {
    // evitar que o formulário seja enviado da maneira convencional
    event.preventDefault();

    // serializar os dados do formulário
    var dados = $(this).serialize();

    // enviar a requisição AJAX
    $.ajax({
        url: '/clientes',
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
    var id = linha.find('.id').text();

    Swal.fire({
        title: 'Desseja realmente excluir?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar',
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: '/clientesDeletar',
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