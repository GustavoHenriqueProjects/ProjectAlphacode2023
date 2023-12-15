<?php

class RegistroController
{

    //Responsavel por devolver a view
    public static function pageHtmlAlphacode()
    {
        include './View/modules/Registro/RegistroForm.php';
    }

    //Responsavel por reigstrar o usuario
    public static function save()
    {
        include './Model/RegistroModel.php';

        $model = new RegistroModel();

        // Preenche as propriedades do modelo com os dados do formulário
        $model->nome = $_POST['nome'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->email = $_POST['email'];
        $model->profissao = $_POST['profissao'];
        $model->numero_telefone = $_POST['numero_telefone'];
        $model->numero_celular = $_POST['numero_celular'];
        $model->possui_whatsapp = isset($_POST['possui_whatsapp']) ? 1 : 0;
        $model->enviar_notificacao_sms = isset($_POST['enviar_notificacao_sms']) ? 1 : 0;
        $model->enviar_notificacao_email = isset($_POST['enviar_notificacao_email']) ? 1 : 0;

        var_dump($_POST); // ou print_r($_POST);

        // Chama o método save do modelo para inserir os dados no banco de dados
        $model->save();

        // Redireciona para a página de sucesso ou outra página desejada
        //header('Location: /sucesso.php');
        exit();
    }
}
