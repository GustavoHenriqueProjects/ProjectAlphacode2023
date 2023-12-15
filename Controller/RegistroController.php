<?php

class RegistroController
{

    //Responsavel por devolver a view
    public static function pageHtmlAlphacode()
    {
        include './View/modules/Registro/RegistroForm.php';
        self::index();
    }

    public static function index()
    {
        include './Model/RegistroModel.php';
        $model = new RegistroModel();
        $model -> getAll();

        include './View/modules/Registro/RegistroForm.php';
    }

    //Responsavel por registrar o usuario
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

    // Chama o método save do modelo para inserir os dados no banco de dados
    $model->save();
    
    echo '<script>window.location.href = "/";</script>';

    exit();
    }

    public static function delete()
    {
        // Verifique se o ID está presente na solicitação DELETE
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        var_dump($id);

        if ($id !== null) {
            include './Model/RegistroModel.php';
            $model = new RegistroModel();

            // Set the ID in the model and call the delete method
            $model->pessoa_id = $id;
            $model->delete();

            // Optionally, redirect or send a response indicating success
            echo json_encode(['success' => true]);
            echo '<script>window.location.href = "/";</script>';

            exit();
        } else {
            // Handle invalid or missing ID
            echo json_encode(['error' => 'Invalid or missing ID']);
            exit();
        }
    }
}
