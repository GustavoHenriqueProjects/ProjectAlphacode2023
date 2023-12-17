<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Projeto alphacode">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Assets/css/reset.css">
    <link rel="stylesheet" href="../../../Assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../Assets/css/header.css">
    <link rel="stylesheet" href="../../../Assets/css/main.css">
    <link rel="stylesheet" href="../../../Assets/css/formRegister.css">
    <link rel="stylesheet" href="../../../Assets/css/tabelaRegistro.css">
    <link rel="stylesheet" href="../../../Assets/css/footer.css">
    <link rel="stylesheet" href="../../../Assets/css/editar.css">
    <title>Alphacode</title>
</head>

<body>
    <header>
        <img id="logo" src="../../../Assets/images/logo_alphacode.png" alt="Logo da empresa Alphacode">
        <h1>Cadastro de contatos</h1>
    </header>
    <main>
        <form method="POST" action="/" id="registroForm">
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" class="form-control bt-4 small-input" placeholder="Ex.: Letícia Pacheco dos Santos" required>
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" placeholder="Ex.: 03/10/2003" required>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Ex.: leticia@gmail.com" required>
                </div>
                <div class="col-md-6">
                    <label for="Profissao">Profissão</label>
                    <input type="text" name="profissao" class="form-control" placeholder="Ex.: Desenvolvedor Web" required>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="telefone">Telefone para contato</label>
                    <input type="tel" name="numero_telefone" class="form-control" placeholder="Ex.: (11) 4033-2019" required>
                </div>
                <div class="col-md-6">
                    <label for="celular">Celular para contato</label>
                    <input type="tel" name="numero_celular" class="form-control" placeholder="Ex.: (11) 98492-2039" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="checkbox" name="possui_whatsapp" class="form-check-input" id="celular-possui-whatsapp">
                    <label class="form-check-label" for="celular-possui-whatsapp">Número de celular possui Whatsapp</label>
                </div>
                <div class="col-md-6">
                    <input type="checkbox" name="enviar_notificacao_email" class="form-check-input" id="notificar-por-email">
                    <label class="form-check-label" for="notificar-por-email">Enviar notificações por E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="checkbox" name="enviar_notificacao_sms" class="form-check-input" id="notificar-por-sms">
                    <label class="form-check-label" for="notificar-por-sms">Enviar notificações por SMS</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-end">Cadastrar contato</button>
        </form>

        <div class="container_registro">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr class="th">
                        <th style="background-color: #068ED0; color: white; ">Nome</th>
                        <th style="background-color: #068ED0; color: white;">Data de nascimento</th>
                        <th style="background-color: #068ED0; color: white;">E-mail</th>
                        <th style="background-color: #068ED0; color: white;">Celular para contato</th>
                        <th style="background-color: #068ED0; color: white;">Editar</th>
                        <th style="background-color: #068ED0; color: white;">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($model->registro) && is_array($model->registro)) : ?>
                        <?php foreach ($model->registro as $item) : ?>
                            <tr class="td">
                                <td><?= $item->nome ?></td>
                                <td><?= date('d/m/Y', strtotime($item->data_nascimento)) ?></td>
                                <td><?= $item->email ?></td>
                                <td><?= $item->numero_celular ?></td>
                                <td><img id="<?= $item->pessoa_id ?>" class="editar" src="../../../Assets/images/editar.png" alt="editar"></td>
                                <td><img id="<?= $item->pessoa_id ?>" class="excluir" src="../../../Assets/images/excluir.png" alt="excluir"></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">Nenhum dado encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Div para editar pessoa -->
    <div id="editForm" class="d-none">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="update_nome" name="update_nome" class="form-control" required>
        <br>
        <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" id="dataNascimento" name="dataNascimento" class="form-control">
        <br>
        <label for="email" class="form-label">Email:</label>
        <input type="text" id="update_email" name="update_email" class="form-control" required>
        <br>
        <label for="celular" class="form-label">Celular:</label>
        <input type="text" id="update_celular" name="update_celular" class="form-control" required>
        <br>
        <button id="salvarEdicao" class="btn btn-primary float-start">Salvar</button>
        <button id="cancelarEdicao" class="btn btn-danger float-end">Cancelar</button>
    </div>

    <footer>
        <p>Termos | Políticas</p>
        <div class="text_img_footer">
            <p>© Copyright 2022 | Desenvolvido por</p>
            <img id="logo_footer" src="../../../Assets/images/logo_rodape_alphacode.png" alt="Logo rodape">
        </div>
        <p>©Alphacode IT Solutions 2022</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="numero_telefone"]', ).mask('(00) 0000-0000');
            $('input[name="numero_celular"]').mask('(00) 00000-0000');
            $('input[name="email"]').mask("A", {
                translation: {
                    "A": {
                        pattern: /[\w@\-.+]/,
                        recursive: true
                    }
                }
            });

            $('input[name="update_celular"]').mask('(00) 00000-0000');
            $('input[name="update_email"]').mask("A", {
                translation: {
                    "A": {
                        pattern: /[\w@\-.+]/,
                        recursive: true
                    }
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.excluir').forEach(function(img) {
            img.addEventListener('click', function() {
                // Obtém o ID da imagem clicada
                let id = img.id;

                let confirmacao = confirm('Deseja realmente excluir?')

                if (confirmacao) {
                    $.ajax({
                        url: '/',
                        type: 'DELETE',
                        data: JSON.stringify({
                            id: Number(id)
                        }),
                        contentType: 'application/json',
                        success: function(response) {
                            location.reload();
                        },
                        error: function(error) {
                            console.log('Erro na requisição AJAX DELETE:', error);
                        }
                    });
                }
            });

        });
    </script>
    <script>
        document.querySelectorAll('.editar').forEach(function(img) {
            img.addEventListener('click', function() {

                let idUser = img.id

                // Encontrar a linha correspondente na tabela
                let tr = img.closest('tr');

                // Obtém os valores dos campos do item correspondente
                let nome = tr.cells[0].innerText; // Nome
                let dataNascimento = tr.cells[1].innerText; // Data de Nascimento
                let email = tr.cells[2].innerText; // Email
                let celular = tr.cells[3].innerText; // Celular

                // Dividir a string em dia, mês e ano
                let partesData = dataNascimento.split('/');
                let dia = partesData[0];
                let mes = partesData[1];
                let ano = partesData[2];

                let dataFormatada = `${ano}-${mes}-${dia}`;

                // Preencher os campos do formulário de edição com os dados do item
                document.getElementById('update_nome').value = nome;
                document.getElementById('dataNascimento').value = dataNascimento;
                document.getElementById('update_email').value = email;
                document.getElementById('update_celular').value = celular;
                document.getElementById('editForm').classList.remove('d-none')

                document.getElementById('salvarEdicao').addEventListener('click', function() {
                    // Obtém os valores dos campos de edição
                    let nome = document.getElementById('update_nome');
                    let data = document.getElementById('dataNascimento');
                    let email = document.getElementById('update_email');
                    let celular = document.getElementById('update_celular');

                    if (nome.value === '' || email.value === '' || celular.value === '') {
                        window.alert('Atenção, não é permitido enviar um campo vazio com exceção da data.');
                        return;
                    }

                    // Validação do e-mail
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email.value)) {
                        window.alert('Por favor, insira um endereço de e-mail válido.');
                        return;
                    }

                    // Validação do número de celular (assumindo um formato específico, por exemplo, 123-456-7890)
                    const celularRegex = /^\(\d{2}\) \d{4,5}-\d{4}$/;
                    if (!celularRegex.test(celular.value)) {
                        window.alert('Por favor, insira um número de celular válido no formato (xx) xxxx-xxxxx.');
                        return;
                    }

                    if (nome.value !== '' || dataNascimento.value !== '' || email.value !== '' || celular.value !== '') {
                        $.ajax({
                            url: '/',
                            type: 'PATCH',
                            data: JSON.stringify({
                                id: Number(idUser),
                                nome: nome.value,
                                dataNascimento: data.value !== '' ? data.value : dataFormatada,
                                email: email.value,
                                numero_celular: celular.value
                            }),
                            contentType: 'application/json',
                            success: function(response) {
                                location.reload()
                            },
                            error: function(error) {
                                console.log('Erro na requisição AJAX UPDATE:', error);
                            }
                        });
                    } else {
                        window.alert('Atenção escolha um campo para atualizar ou cancele.')
                    }
                });
            });
        });

        function formatarDataParaIngles(data) {
            const partes = data.split('/');
            const dataFormatada = `${partes[2]}-${partes[1]}-${partes[0]}`;
            return dataFormatada;
        }

        document.getElementById('cancelarEdicao').addEventListener('click', function() {
            document.getElementById('editForm').classList.add('d-none');
        });
    </script>
</body>

</html>