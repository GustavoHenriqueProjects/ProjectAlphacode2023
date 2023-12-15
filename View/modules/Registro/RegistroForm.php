<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <title>Alphacode</title>
</head>

<body>
    <header>
        <img id="logo" src="../../../Assets/images/logo_alphacode.png" alt="Logo da empresa Alphacode">
        <h1>Cadastro de contatos</h1>
    </header>
    <main>
        <form action="/form/save" method="post">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" class="form-control bt-4 small-input" placeholder="Ex.: Letícia Pacheco dos Santos" required>
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" placeholder="Ex.: 03/10/2003" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Ex.: leticia@gmail.com" required>
                </div>
                <div class="col-md-6">
                    <label for="Profissao">Profissão</label>
                    <input type="text" name="profissao" class="form-control" placeholder="Ex.: Desenvolvedor Web" required>
                </div>
            </div>
            <div class="row mb-4">
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
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="numero_telefone"]').mask('(00) 0000-0000');
            $('input[name="numero_celular"]').mask('(00) 00000-0000');
            $('input[name="email"]').mask("A", {
                translation: {
                    "A": {
                        pattern: /[\w@\-.+]/,
                        recursive: true
                    }
                }
            });
        });
    </script>
</body>

</html>